<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use foo\bar;
use Illuminate\Http\Request;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'email'  => "required|email",
            'bid_amount' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'product_id' => 'required|numeric'
        ])->validate();

        $bid = Bid::whereEmail($request->email)
            ->whereProductId($request->product_id)
            ->first();


        if ($bid){
            session(['email' => $bid->email, 'product_id' => $bid->product_id]);
            \Flash::info("Yo already submitted a bid of <b>R{$bid->amount}</b> with Email : <b>$bid->email</b>");
            return back();
        }

        Bid::create([
            'email' => $request->email,
            'amount' => $request->bid_amount,
            'product_id' => $request->product_id,
        ]);

        session(['email' => $request->email, 'product_id' => $request->product_id]);
        \Flash::success('Bidding submitted successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
