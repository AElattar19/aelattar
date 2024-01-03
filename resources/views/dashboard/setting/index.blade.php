@extends('dashboard.layouts.master')

@section('body')


<br />
<div class="container-fluid">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit-Profile</span>
            </div>
        </div>
 
    </div>
    <!-- breadcrumb -->

    <!-- row -->
    <form method="post" enctype="multipart/form-data" action="{{ route('setting.update', $data) }}">

    <div class="row row-sm">
        <!-- Col -->
        @csrf
        {{ method_field('PUT') }}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 

        
        <div class="row row-sm col-lg-12">
            <div class="col-lg-12 col-md-12">
                <div class="card" id="basic-alert">
                    <div class="card-body">
                        <div>
                            <h6 class="card-title mb-1">Basic Style Tabs</h6>
                        </div>
                        <div class="text-wrap">
                            <div class="example">
                                <div class="panel panel-primary tabs-style-1">

                                    <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                        <div class="tab-content">
                                                
                                                    <div class="row row-sm">
                                                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10 required">title</p>
                                                            <input class="form-control" id="Text input with radiobox" type="text" name="title" value="{{ $data->title }}"  required>
                                                        </div>



                                                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10 required">md</p>
                                                            <input class="form-control" id="Text input with radiobox" type="text" name="md" value="{{ $data->md }}"  required>
                                                        </div>

                                                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10 required">mk</p>
                                                            <input class="form-control" id="Text input with radiobox" type="text" name="mk" value="{{ $data->mk }}"  required>
                                                        </div>

                                                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10 required">des</p>
                                                            <input class="form-control" id="Text input with radiobox" type="text" name="des" value="{{ $data->des }}"  required>
                                                        </div>
                                                    </div>
                                               
        
                                        </div>
                                    </div>
                                </div>
                            </div>

        
                        </div>
                    </div>
                </div>
            </div>
        
        </div>


        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card" id="basic-alert">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Input Groups
                    </div>
                    <div class="row row-sm">
                        <div class="col-lg-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">youtube</span>
                                </div><input aria-describedby="basic-addon1" name="youtube" class="form-control" value="{{ $data->youtube }}" type="text">
                            </div><!-- input-group -->
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">facebook</span>
                                </div><input aria-describedby="basic-addon1" name="facebook" class="form-control" value="{{ $data->facebook }}" type="text">
                            </div><!-- input-group -->
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">github</span>
                                </div><input aria-describedby="basic-addon1" name="github" class="form-control" value="{{ $data->github }}" type="text">
                            </div><!-- input-group -->
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">linkedin</span>
                                </div><input aria-describedby="basic-addon1" name="linkedin" class="form-control" value="{{ $data->linkedin }}" type="text">
                            </div><!-- input-group -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card" id="basic-alert">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Input Groups
                    </div>
                    <div class="row row-sm">
                        <div class="col-lg-6 mg-b-20 mg-lg-b-0">
                            <p class="mg-b-10 ">logo</p>
                            <input class="form-control" type="file" name="logo"  >
                        </div>
                        <div class="col-lg-6 mg-b-20 mg-lg-b-0">
                            <p class="mg-b-10 ">favicon</p>
                            <input class="form-control" type="file" name="favicon"  >
                        </div>
                     
                    </div>

                </div>
            </div>
        </div>

        <div class="row row-sm col-lg-12">
            <div class="col-lg-12 col-md-12">
                <div class="card  box-shadow-0">
                    <div class="card-header">
                        <h4 class="card-title mb-1">Default Form</h4>
                    </div>
                    <div class="card-body pt-0">


        
                            <div class="form-group mb-0 mt-3 justify-content-end">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>
         
        </div>
        
        <!-- /Col -->
   
    </div>
</form>
    <!-- row closed -->
</div>

@endsection
