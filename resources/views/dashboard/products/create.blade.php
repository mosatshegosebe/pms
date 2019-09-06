@extends('layouts.app')
@push('styles')
  <style>
    .custom-file-label::after {
      left: 0;
      right: auto;
      background-color: #6c757d;
      color: white;
      border-left-width: 0;
      border-right: inherit;
    }
  </style>
@endpush
@section('content')
  <div class="card">
    <h4 class="ml-1">Create New Product</h4>
    <div class="card-header"></div>
    <div class="card-body">
      {!! Form::open(['method' => 'POST', 'route' => 'dashboard.products.store', 'enctype' => 'multipart/form-data']) !!}

      @include('dashboard.products._product_fields')
      <div class="input-group p-2">
        <div class="custom-file">
          <input id="product_image" type="file" class="form-control" name="product_image">
        </div>
      </div>
      {!! Form::submit('create', ['class' => 'btn btn-primary']) !!}

      {!! Form::close() !!}
    </div>
  </div>
@endsection