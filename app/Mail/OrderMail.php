<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form)
    {
        $this->data = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->data['email'])
            ->from('system.project.team24@kanda-it-school-system.com','株式会社神田ユニフォーム')
            ->subject('【神田ユニフォーム】注文完了(銀行振り込み)')
            ->view('order_mail')
            ->with(['data' => $this->data]);
    }
}
