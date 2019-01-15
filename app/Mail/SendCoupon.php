<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCoupon extends Mailable
{
    use Queueable, SerializesModels;

    public $client;
    public $coupon;
    public $date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Client $client, \App\Coupon $coupon, $date)
    {
        $this->client = $client;
        $this->coupon = $coupon;
        $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.send-coupon')->subject('Special Pre-sale');
    }
}
