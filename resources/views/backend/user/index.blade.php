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
                                  <h1 class="card-description" style="text-align: center;">List User<a href="{{route('backend.user.create')}}" class="btn btn-info" style="float: right; color: white"><i class="mdi mdi-library-plus"></i> Create User</a></h1>
                                  @include('backend.includes.flash_message')
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>SN</th>
              <th>Name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($data['rows'] as $key => $row)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$row->name}}</td>
              <td>
                @if ($row->status == 1)
                  <span class="label label-success">Active</span>
                    @else
                  <span class="label label-danger">DeActive</span>
                @endif
              </td>
              <td>
                <a href="{{route( $base_route . '.edit',$row->id)}}" class="btn btn-info"><i class="mdi mdi-table-edit"></i> Edit</a><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{route($base_route . '.show',$row->id)}}" class="btn btn-warning"><i class="mdi mdi-eye"></i> Show</a>
                {!! Form::open(['route' => [$base_route . '.destroy',$row->id], 'method' => 'delete','onsubmit' => "return confirm('are you sure to delete?')"]) !!}
                 {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
@endsection
