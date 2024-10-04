<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OtpNotification extends Notification
{
    use Queueable;

    protected $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Your OTP Code')
                    ->greeting('Hello!')
                    ->line('Your OTP code is: ' . $this->otp)
                    ->line('Please use this code to verify your account.')
                    ->line('Thank you for using our application!');
    }
}
