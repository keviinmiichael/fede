<?php

namespace App\Mail;

use App\Purchase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuccessPurchaseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $purchase;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view = ( in_array($this->purchase->payMethod, ['Mercado Pago', 'Paypal'])) ? 'paid-purchase' : 'purchase-transfer';
        return $this->view("emails.$view")->subject('Resumen de compra');
    }
}
