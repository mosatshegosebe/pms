<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ItemViewed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $product;
    public $list;

    /**
     * Create a new event instance.
     *
     * @param Product $product
     * @param bool    $list
     */
    public function __construct(Product $product, $list = false)
    {
        $this->product = $product;
        $this->list = $list;
    }

    ///**
    // * Get the channels the event should broadcast on.
    // *
    // * @return \Illuminate\Broadcasting\Channel|array
    // */
    //public function broadcastOn()
    //{
    //    return new PrivateChannel('channel-name');
    //}
}
