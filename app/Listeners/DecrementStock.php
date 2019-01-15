<?php

namespace App\Listeners;

use App\Events\PurchaseCompleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DecrementStock
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
        foreach ($event->purchase->items as $item) {
            \App\Stock::where('product_id', $item->product_id)->decrement('amount', $item->amount);
            \App\Product::where('id', $item->product_id)->decrement('stock', $item->amount);
        }
    }
}
