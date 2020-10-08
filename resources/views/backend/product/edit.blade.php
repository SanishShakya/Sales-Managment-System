@extends('layouts.backend')

@section('title',$panel . ' ' . $page_title)

@section('content')
  <!-- Content Header (Page header) -->

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
          <h1 class="card-description" style="text-align: center;">Edit Product<a href="{{route('backend.product.create')}}" class="btn btn-info" style="float: right; color: white"><i class="mdi mdi-library-plus"></i> Create Product</a><a href="{{route('backend.product.index')}}" class="btn btn-primary" style="float: right; color: white"><i class="mdi mdi mdi-view-list"></i> List Product</a></h1>

      @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
{{--        {!! Form::open(['route' => ['backend.tag.update',$data['row']->id], 'method' => 'post']) !!}--}}
       {!! Form::model($data['row'], ['route' => [$base_route.'.update', $data['row']->id],'method' => 'PUT']) !!}
        @include($view_path . '.include.main_form',['button' => 'Update ' . $panel])
        {!! Form::close() !!}
      </div>
      <!-- /.box-body -->
        <footer class="footer">
            <div class="footer-wrap">
                <div class="w-100 clearfix">
                    <span class="d-block text-center text-sm-left d-sm-inline-block">Copyright © {{date('Y')}} <a href="https://www.templatewatch.com/" target="_blank">templatewatch</a>. All rights reserved.</span>
                </div>
            </div>
        </footer>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
@endsection
