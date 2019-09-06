@extends('layouts.app')
{{--@dd(get_defined_vars())--}}
@section('content')
  <div class="card p-2">
    <div class="row">
      <div class="col-3">
        <img class="img-thumbnail" src="{{url('uploads/products/'.$product->image->filename)}}" alt="Card image cap">
        {!! link_to_route('store.front.index', 'Back', '', ['class' => 'btn btn-outline-dark btn-sm  float-right','title' => 'Back']) !!}
      </div>
      <div class="col-9">
        <h3>{{$product->name}}</h3>
        <dl class="row">
          <dt class="col-sm-3">Description</dt>
          <dd class="col-sm-9">{{$product->description}}.</dd>

          <dt class="col-sm-3">SKU</dt>
          <dd class="col-sm-9">{{$product->sku}}.</dd>

          @foreach($bids as $key => $bid)
            <dt class="col-sm-3">{{ ucfirst($key) }} Bid</dt>
            <dd class="col-sm-9">R {{$bid}}</dd>
          @endforeach

          <dt class="col-sm-3"><em class="font-weight-bold h3">{{$product->price}} ZAR</em></dt>
        </dl>

        @if(!isset($currentBid))
        {!! Form::open(['method' => 'POST', 'route' => 'store.bid.store']) !!}
        <div class="row">
          <div class="col">
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                {!! Form::label('email', 'Email: ', ['class' => 'input-group-text']) !!}
              </div>
              {!! Form::text('email', null,  ['class' => 'form-control']) !!}
            </div>
          </div>
          <div class="col">
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                {!! Form::label('bid_amount', 'Amount: ', ['class' => 'input-group-text']) !!}
              </div>
              {!! Form::number('bid_amount', null,  ['class' => 'form-control', 'step' => '0.01', 'min' => '0']) !!}
            </div>
          </div>
          <div class="col">
            {!! Form::submit('Place Bid', ['class' => 'btn btn-sm btn-primary']) !!}
          </div>
        </div>
        {!! Form::hidden('product_id', Request::segment(3)) !!}
        {!! Form::close() !!}
          @endif
      </div>
    </div>
  </div>
@endsection