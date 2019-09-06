@extends('layouts.app')

@section('content')
  {!! link_to_route('dashboard.products.create', 'Add New Product', null, ['class' => 'btn btn-outline-warning text-dark m-2 float-right']) !!}
  <div class="row">
    @foreach($products as $product)
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          {{--save path creation in services and return full path here --}}
          <img class="card-img-top img-thumbnail" src="{{url('uploads/products/'.$product->image->filename)}}" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">{{$product->description}}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                {!! link_to_route('dashboard.products.show', 'View', $product->id, ['class' => 'btn btn-sm btn-outline-secondary']) !!}
                {!! link_to_route('dashboard.products.edit', 'Edit', $product->id, ['class' => 'btn btn-sm btn-outline-primary']) !!}
                {{--{!! link_to_route('dashboard.products.destroy', 'Delete', $product->id, ['class' => 'btn btn-sm btn-outline-danger']) !!}--}}
                {!! Form::button('Delete', ['class' => 'btn btn-sm btn-outline-danger btn-delete', 'data-toggle' => 'modal', 'data-target' => '#delete-modal', 'id' => $product->id]) !!}
              </div>
              <small class="text-muted">9 mins</small>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <div class="modal" id="delete-modal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          {!! Form::open(['method' => 'DELETE', 'id' => 'delete-form']) !!}
          <!-- Modal body -->
            <div class="modal-body">
              <h2>Please confirm that you would like to delete this product : </h2>


            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              {{ Form::submit('Confirm', ['class' => 'btn btn-primary']) }}
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            {!! Form::close() !!}

          </div>
        </div>
      </div>
  </div>
  @endsection
@push('scripts')
  <script>
    $('.btn-delete').on('click', function() {
      var url = "{{ route('dashboard.products.destroy', -1) }}";
      $('#delete-form').attr('action', changeParams(url, $(this).attr('id')));
    });
  </script>
  @endpush