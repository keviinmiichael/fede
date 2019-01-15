<?php

namespace App\Listeners;

use App\Events\PurchaseRejected;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncrementStock
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
        foreach ($event->purchase->items as $item) {
            \App\Stock::where('product_id', $item->product_id)->increment('amount', $item->amount);
            \App\Product::where('id', $item->product_id)->increment('stock', $item->amount);
        }
    }
}
