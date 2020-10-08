@extends('layouts.backend')
@section('title','Dashboard Page')
@section('content')

    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">

                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="text-align: center;">Welcome,{{ucFirst(auth()->user()->name)}} to Dashboard
                                    </h4>
                                <p class="card-description">
                                    Start creating your amazing application!
                                </p>
                                <p class="card-description">
{{--                                    @include('backend.includes.flash_message')--}}
                                </p>

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
