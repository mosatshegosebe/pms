<?php

namespace App\Http\Controllers;

use App\Events\ItemViewed;
use App\Models\Bid;
use App\Models\Product;
use App\Service\BidService;
use Illuminate\Http\Request;

class StoreFrontController extends Controller
{
    public function index()
    {
        $products = Product::paginate(20);

        $productList = $products->items();

        foreach($productList as $product){
            event(new ItemViewed($product, true));
        }

        return view('store-front.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $bidService = app(BidService::class);

        $currentBid = Bid::where('product_id', $product->id)
            ->whereEmail(\Session::get('email'))
            ->first();

        $bids = [
            'highest' => number_format($bidService->getHighestBid($product->id), 2, '.', ',')  ?? '0.00',
            'average' => number_format($bidService->getAverageBid($product->id), 2, '.', ','),
            'your' => $currentBid != null ? $currentBid->amount : '0.00',
        ];

        event(new ItemViewed($product));

        return view('store-front.products.show', compact('product', 'bids', 'currentBid'));
    }
}
