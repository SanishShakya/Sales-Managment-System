@extends('layouts.backend')
@section('title',$panel . ' ' . $page_title)
@section('content')
  <!-- Content Header (Page header) -->
  <!-- Main content -->
  <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
          <div class="content-wrapper">
              <div class="row">

                  <div class="col-lg-12 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">
                              <div class="box-body">
                                  <h1 class="card-description" style="text-align: center;">List Sale
                                      <a href="{{route('backend.sale.create')}}" class="btn btn-info" style="float: right; color: white">
                                          <i class="mdi mdi-library-plus"></i> Create Sale</a></h1>
                                  @include('backend.includes.flash_message')
        <table class="table table-bordered">
          <thead style="text-align: center">
            <tr>
              <th>SN</th>
              <th>Customer</th>
                <th>Product Name</th>
                <th>Attribute</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody style="text-align: center">
          @foreach ($data['rows'] as $key => $row)
            <tr>
              <td>{{$key+1}}</td>
                <td>{{$row->name}}</td>
              <td>{{$row->productName->name}}</td>
                <td>{{$row->productName->attribute}}</td>
                <td>{{$row->quantity}}</td>
                <td>{{$row->productName->price}}</td>
                <td>{{$total = $row->productName->price*$row->quantity}}</td>
                <td>
                @if ($row->status == 1)
                  <span class="label label-success">Active</span>
                    @else
                  <span class="label label-danger">DeActive</span>
                @endif
              </td>
              <td>
                <a href="{{route( $base_route .'.edit',$row->id)}}" class="btn btn-info"><i class="mdi mdi-table-edit"></i> Edit</a><br>
{{--                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{route($base_route . '.show',$row->id)}}" class="btn btn-warning"><i class="mdi mdi-eye"></i> Show</a>--}}
                {!! Form::open(['route' => [$base_route . '.destroy',$row->id], 'method' => 'delete','onsubmit' => "return confirm('are you sure to delete?')"]) !!}
                 {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
          </tbody>

        </table>

{{--       <div class="class"><a href="{{route('backend.sale.print')}}" class="btn btn-info" style="float: right; color: white">Print Sale</a></div>--}}
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
  <!-- /.content -->
@endsection
