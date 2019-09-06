@extends('layouts.app')

@section('content')
  <div class="row">
    @foreach($products as $product)
      <div class="col-md-2">
        <div class="card mb-4 shadow-sm">
          {{--save path creation in services and return full path here --}}
          <img class="card-img-top img-thumbnail" src="{{url('uploads/products/'.$product->image->filename)}}" alt="Card image cap">
          <div class="card-body">
            <p class="card-text font-weight-bold">{{$product->name}}</p>
            <p class="card-text">Sku: {{$product->sku}}</p>
            {{--<p class="card-text">Description: {{$product->description}}</p>--}}
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                {!! link_to_route('store.front.show', 'View', $product->id, ['class' => 'btn btn-sm btn-outline-secondary']) !!}
                {{--{!! link_to_route('dashboard.products.edit', 'Edit', $product->id, ['class' => 'btn btn-sm btn-outline-primary']) !!}--}}
                {{--{!! link_to_route('dashboard.products.destroy', 'Delete', $product->id, ['class' => 'btn btn-sm btn-outline-danger']) !!}--}}
                {{--{!! Form::button('Delete', ['class' => 'btn btn-sm btn-outline-danger btn-delete', 'data-toggle' => 'modal', 'data-target' => '#delete-modal', 'id' => $product->id]) !!}--}}
              </div>
              <h6 class="text-muted">ZAR {{$product->price}}</h6>
            </div>
          </div>
        </div>
      </div>
  @endforeach
  </div>
@endsection