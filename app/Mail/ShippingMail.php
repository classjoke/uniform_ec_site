<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShippingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->data = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->data->user->email)
            ->from('system.project.team24@kanda-it-school-system.com','株式会社神田ユニフォーム')
            ->subject('【神田ユニフォーム】商品発送のお知らせ')
            ->view('shipping_mail')
            ->with(['data' => $this->data]);
    }
}
