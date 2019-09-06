@extends('layouts.app')

@section('content')
  <div class="card">
    <h4 class="ml-1">Edit Product: {{$product->name}}</h4>
    <div class="card-header"></div>
    <div class="card-body">
      {!! Form::model($product, ['method' => 'PATCH','enctype' => 'multipart/form-data','route' => ['dashboard.products.update', $product->id]]) !!}
      <div class="row">
        <div class="col-9">
          @include('dashboard.products._product_fields')
        </div>
        <div class="col-3">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top img-thumbnail" src="{{url('uploads/products/'.$product->image->filename)}}" alt="Card image cap">
          </div>
          <input id="product_image" type="file" class="form-control" name="product_image">
        </div>
      </div>

      {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
      {!! link_to_route('dashboard.products.index', 'Back', '', ['class' => 'btn btn-outline-dark','title' => 'Back']) !!}


      {!! Form::close() !!}
    </div>
  </div>
@endsection