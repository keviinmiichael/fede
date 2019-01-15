<?php

namespace App\Listeners;

use App\Events\PurchaseRejected;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPurchaseErrorNotification
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
     * @param  PurchaseRejected  $event
     * @return void
     */
    public function handle(PurchaseRejected $event)
    {
        //
    }
}
