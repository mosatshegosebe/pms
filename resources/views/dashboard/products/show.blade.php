@extends('layouts.app')

@section('content')
  <div class="card p-2">
    <div class="row">
      <div class="col-3">
        <img class="img-thumbnail" src="{{url('uploads/products/'.$product->image->filename)}}" alt="Card image cap">
        {!! link_to_route('dashboard.products.index', 'Back', '', ['class' => 'btn btn-outline-dark btn-sm  float-right','title' => 'Back']) !!}
      </div>
      <div class="col-5">
        <h3>{{$product->name}}</h3>
        <dl class="row">
          <dt class="col-sm-3">Description</dt>
          <dd class="col-sm-9">{{$product->description}}.</dd>

          <dt class="col-sm-3">SKU</dt>
          <dd class="col-sm-9">{{$product->sku}}.</dd>

          <dt class="col-sm-3">Price</dt>
          <dd class="col-sm-9">{{$product->price}}</dd>

          <dt class="col-sm-3">Single View Count</dt>
          <dd class="col-sm-9">{{$product->single_count}}</dd>

          <dt class="col-sm-3">Products List View Count</dt>
          <dd class="col-sm-9">{{$product->product_list_count}}</dd>
        </dl>
      </div>
      <div class="col-4 border-dark border-left">
        <h3>Bids</h3>
        @foreach($bids as $key => $bid)
          <dl class="row">
            <dt class="col-sm-3">{{ strtoupper($key) }} BID</dt>
            <dd class="col-sm-9">R {{$bid}}</dd>
          </dl>
        @endforeach
        <div class="card-body table-responsive px-0">
          <table class="table table-hover table-sm">
            <thead class="table-dark text-center">
            <tr>
              <th>Bidder</th>
              <th>Bid Amount</th>
              <th>date</th>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach($productBids as $bid)
              <tr>
                <td>{{ $bid->email }}</td>
                <td>R {{ $bid->amount }}</td>
                <td>{{ date('F d, Y H:i', $bid->created_at->timestamp) }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection