<div class="row">
  <div class="col">
    <div class="input-group input-group-sm">
      <div class="input-group-prepend">
        {!! Form::label('name', 'Product name: ', ['class' => 'input-group-text']) !!}
      </div>
      {!! Form::text('name', null,  ['class' => 'form-control']) !!}
    </div>
  </div>
  <div class="col">
    <div class="input-group input-group-sm">
      <div class="input-group-prepend">
        {!! Form::label('sku', 'SKU: ', ['class' => 'input-group-text']) !!}
      </div>
      {!! Form::text('sku', null,  ['class' => 'form-control']) !!}
    </div>
  </div>
  <div class="col">
    <div class="input-group input-group-sm">
      <div class="input-group-prepend">
        {!! Form::label('price', 'Price: ', ['class' => 'input-group-text']) !!}
      </div>
      {!! Form::text('price', null,  ['class' => 'form-control']) !!}
    </div>
  </div>
</div>
<div class="row my-3">
  <div class="col">
    <div class="input-group input-group-sm">
      <div class="input-group-prepend">
        {!! Form::label('description', 'Description: ', ['class' => 'input-group-text']) !!}
      </div>
      {!! Form::textarea('description', null,  ['class' => 'form-control']) !!}
    </div>
  </div>
</div>