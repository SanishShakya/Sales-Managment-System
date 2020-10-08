@extends('layouts.backend')

@section('title',$panel . ' ' . $page_title)

@section('content')
  <!-- Content Header (Page header) -->


    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">

                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="box-body">
                                    <h1 class="card-description" style="text-align: center;">Create User<a href="{{route('backend.user.index')}}" class="btn btn-info" style="float: right; color: white"><i class="mdi mdi mdi-view-list"></i> List User</a></h1>
                                    @include('backend.includes.flash_message')

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    {!! Form::open(['route' =>  $base_route. '.store', 'method' => 'post']) !!}
                                    @include($view_path . '.include.main_form',['button' => 'Save ' . $panel])
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
                <div class="footer-wrap">
                    <div class="w-100 clearfix">
                        <span class="d-block text-center text-sm-left d-sm-inline-block">Copyright © {{date('Y')}} <a href="https://www.templatewatch.com/" target="_blank">templatewatch</a>. All rights reserved.</span>
                    </div>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>

@endsection

