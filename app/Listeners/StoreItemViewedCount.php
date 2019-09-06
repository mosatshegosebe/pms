<?php

namespace App\Listeners;

use App\Events\ItemViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreItemViewedCount
{
    /**
     * Handle the event.
     *
     * @param  ItemViewed  $event
     * @return void
     */
    public function handle(ItemViewed $event)
    {
        $product = $event->product;

        if ($event->list){
            $product->update([
                'product_list_count' => $product->product_list_count + 1,
            ]);
        } else {
            $product->update([
                'single_count' => $product->single_count + 1,
            ]);
        }
    }
}
