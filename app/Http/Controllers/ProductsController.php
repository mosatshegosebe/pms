<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Service\BidService;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $bidService;

    //add service for other this controller
    public function __construct(BidService $service)
    {
        $this->bidService = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('dashboard.products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     *
     * @return \Illuminate\Http\Response
     * @throws FileNotFoundException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(ProductRequest $request)
    {
        \Validator::make($request->all(), [
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ])->validate();

        $imageId = Product::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        $uploadedImage = $request->file('product_image');

        $extension = $uploadedImage->getClientOriginalExtension();
        try {
            \Storage::disk('public')->put($uploadedImage->getFilename() . '.' . $extension, \File::get($uploadedImage));
        } catch (FileNotFoundException $e) {
            \Log::error($e->getMessage());
            \Flash::error('Could not store product image');
            Throw $e;
        }

        ProductImage::create([
            'product_id' => $imageId->id,
            'mime' => $uploadedImage->getClientMimeType(),
            'filename' => $uploadedImage->getFilename().'.'.$extension,
        ]);

        \Flash::success('Product was successfully added.');

        return redirect()->route('dashboard.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $bids = [
            'highest' => number_format($this->bidService->getHighestBid($product->id), 2, '.', ','),
            'average' => number_format($this->bidService->getAverageBid($product->id), 2, '.', ','),
            'lowest' => number_format($this->bidService->getLowestBid($product->id), 2, '.', ',')
        ];

        $productBids = $this->bidService->productBids($product->id);

        return view('dashboard.products.show', compact('product', 'bids', 'productBids'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('dashboard.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(ProductRequest $request, $id)
    {
        \Validator::make($request->all(), [
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ])->validate();

        if ($request->hasFile('product_image')){
            $productImage = ProductImage::whereProductId($id)
            ->first();

            if ($productImage){
                //put this in services
                $productImage->delete();
                \Storage::disk('public')->move($productImage->filename, "deleted/$productImage->filename");
            }

            $uploadedImage = $request->file('product_image');
            $extension = $uploadedImage->getClientOriginalExtension();
            \Storage::disk('public')->put($uploadedImage->getFilename() . '.' . $extension, \File::get($uploadedImage));
            ProductImage::create([
                'product_id' => $id,
                'mime' => $uploadedImage->getClientMimeType(),
                'filename' => $uploadedImage->getFilename().'.'.$extension,
            ]);
        }
        Product::whereId($id)
            ->update([
                'name' => $request->name,
                'sku' => $request->sku,
                'price' => $request->price,
                'description' => $request->description,
                'updated_by' => \Auth::user()->email
            ]);

        \Flash::success("Updated successfully");

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorFail($id);
        $product->update(['deleted_by' => \Auth::user()->email]);
        \Storage::disk('public')->move($product->image->filename, "deleted/{$product->image->filename}");
        $product->delete();
        \Flash::success("Deleted successfully");

        return back();
    }
}
