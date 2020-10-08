<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null,['placeholder' => 'Enter Name','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'name'])
</div>
<div class="form-group">
    {!! Form::label('product_id','Product') !!}
    {!! Form::select('product_id', $data['rows'], null, ['placeholder' => 'Select Product...','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'product_id'])
</div>
<div class="form-group">
  {!! Form::label('quantity', 'Quantity') !!}
  {!! Form::number('quantity', null,['placeholder' => 'Enter Quantity','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'quantity'])
</div>
<div class="form-group">
  {!! Form::label('status', 'Status') !!}
  {!! Form::radio('status', 1) !!} Active
  {!! Form::radio('status', 0,true) !!} De Active
</div>

<div class="form-group">
  {!! Form::submit($button,['class' => 'btn btn-success']) !!}
</div>
