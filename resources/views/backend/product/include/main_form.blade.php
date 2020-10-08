<div class="form-group">
  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', null,['placeholder' => 'Enter Name','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'name'])
</div>
<div class="form-group">
  {!! Form::label('price', 'Price') !!}
  {!! Form::number('price', null,['placeholder' => 'Enter Price','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'price'])
</div>
<div class="form-group">
  {!! Form::label('quantity', 'Quantity') !!}
  {!! Form::number('quantity', null,['placeholder' => 'Enter Quantity','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'price'])
</div>
<div class="form-group">
    {!! Form::label('attribute', 'Attribute') !!}
    {!! Form::text('attribute', null,['placeholder' => 'Enter Attribute','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'attribute'])
</div>
<div class="form-group">
  {!! Form::label('status', 'Status') !!}
  {!! Form::radio('status', 1) !!} Active
  {!! Form::radio('status', 0,true) !!} De Active
</div>
<div class="form-group">
  {!! Form::submit($button,['class' => 'btn btn-success']) !!}
</div>
