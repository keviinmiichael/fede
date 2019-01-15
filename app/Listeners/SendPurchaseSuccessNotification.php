<?php

namespace App\Listeners;

use App\Events\PurchaseCompleted;
use App\Mail\SuccessPurchaseMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPurchaseSuccessNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PurchaseCompleted  $event
     * @return void
     */
    public function handle(PurchaseCompleted $event)
    {
        $email = new SuccessPurchaseMail($event->purchase);
        try {
            \Mail::to($event->purchase->client)->bcc(env('CONTACT_EMAIL'))->send($email);
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
        }
    }
}
