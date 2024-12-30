<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    public $user;
    public $token;

    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    public function build()
    {
        return $this->from('nhdkhang1710@gmail.com', 'Nhà sách KP')
                    ->subject('Đặt lại mật khẩu')
                    ->view('emails.password-reset')
                    ->with([
                        'resetLink' => route('password.reset', ['token' => $this->token]),
                    ]);
    }
}