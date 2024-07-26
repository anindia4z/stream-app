<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Packages;
use App\Models\UserPremium;
use Illuminate\Support\Carbon;

class WebhookController extends Controller
{
    public function handler(Request $request)
    {
        \Midtrans\Config::$isProduction = (bool) env('MIDTRANS_IS_PRODUCTION');
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        $notif = new \Midtrans\Notification();

        $transactionStatus = $notif->transaction_status;
        $transactionCode = $notif->order_id;
        $fraudStatus = $notif->fraud_status;
        $status = '';

        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'challenge') {
                $status = 'challenge';
            } else  if ($fraudStatus == 'accept') {
                $status = 'success';
            }
        } else if ($transactionStatus == 'settlement') {
            $status = 'success';
        } else if (
            $transactionStatus == 'cancel' ||
            $transactionStatus == 'deny' ||
            $transactionStatus == 'expire'
        ) {
            $status = 'failure';
        } else if ($transactionStatus == 'pending') {
            $status = 'pending';
        }

        $transaction = Transaction::with('package')
            ->where('transaction_code', $transactionCode)
            ->first();

        if ($status === 'success') {
            $userPremium = UserPremium::where('user_id', $transaction->user_id)->first();

            if ($userPremium) {
                //renewal subcription
                $endOfSubcription = $userPremium->end_of_subcription;
                $date = Carbon::createFromFormat('Y-m-d', $endOfSubcription);
                $newEndSubcription = $date->addDays($transaction->package->max_days)->format('Y-m-d');

                $userPremium->update([
                    'package_id' => $transaction->package_id,
                    'end_of_subcription' => $newEndSubcription
                ]);
            } else {
                //new
                UserPremium::create([
                    'package_id' => $transaction->package->id,
                    'user_id' => $transaction->user_id,
                    'end_of_subcription' => now()->addDays($transaction->package->max_days)
                ]);
            }
        }

        $transaction->update(['status' => $status]);
    }

}
