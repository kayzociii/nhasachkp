<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->from('nhdkhang1710@gmail.com', 'Nhà sách KP')
                    ->to($this->user->email)  // Đặt tiêu đề To trước
                    ->subject('Xác thực tài khoản của bạn')  // Sau đó đặt tiêu đề Subject
                    ->view('emails.verification')
                    ->with([
                        'verificationUrl' => route('verify', ['token' => $this->user->email_verification_token]),
                    ]);
    }
}
