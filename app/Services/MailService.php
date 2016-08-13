<?php

namespace App\Services;

use App\User;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

class MailService
{
    /** @var Mailer */
    protected $mail;

    /**
     * EmailService constructor.
     *
     * @param Mailer $mail
     */
    public function __construct(Mailer $mail)
    {
        $this->mail = $mail;
    }

    /**
     * 發送純文字信件
     *
     * @param User $mailTo
     * @param string $text
     */
    public function sendPlainMail(User $mailTo, $text)
    {
        $this->mail->send('emails.raw', ['text' => $text], function (Message $message) use ($mailTo) {
            $message->to($mailTo->email, $mailTo->name);
        });
    }

    /**
     * 發送信箱驗證信件
     *
     * @param User $mailTo
     * @param string $link
     */
    public function sendEmailConfirmation(User $mailTo, $link)
    {
        $data = [
            'name' => $mailTo->name,
            'link' => $link,
        ];
        $this->mail->send('emails.email_confirmation', $data, function (Message $message) use ($mailTo) {
            $message->to($mailTo->email, $mailTo->name);
            $message->subject('[' . config('site.name') . '] 信箱驗證');
        });
    }
}
