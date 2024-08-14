<?php

namespace App\Http\Middleware;

use App\Models\UserPremium;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = auth()->user()->id;
        $userPremium = UserPremium::with('package')
        ->where('user_id', $userId)
        ->first();

        /*if($userPremium->diff()>30){
            return redirect()->route('pricing');
        } */

        return $next($request);
    }

}
