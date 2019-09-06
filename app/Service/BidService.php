<?php

namespace App\Service;

use App\Models\Bid;

class BidService
{
    private $bid;

    public function __construct(Bid $bid)
    {
        $this->bid = $bid;
    }

    /**
     * @param int $productId
     *
     * @return mixed
     */
    public function productBids(int $productId)
    {
        $bids = $this->bid->orderBy('id', 'DESC')//add index
            ->where('product_id',$productId)
            ->get();

        return $bids;
    }

    public function getAverageBid(int $productId)
    {
        return $this->bid->where('product_id',$productId)->avg('amount');
    }

    /**
     * @param int $productId
     *
     * @return mixed
     */
    public function getHighestBid(int $productId)
    {
        return $this->bid->where('product_id',$productId)->max('amount');;
    }

    /**
     * @param int $productId
     *
     * @return mixed
     */
    public function getLowestBid(int $productId)
    {
        return $this->bid->where('product_id',$productId)->min('amount');
    }
}