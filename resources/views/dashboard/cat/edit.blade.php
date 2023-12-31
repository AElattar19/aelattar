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
    <form method="post" enctype="multipart/form-data" action="{{ route('category.update', $data) }}">

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

        <!-- Col -->
        <input type="hidden" name="active" value="{{$data->active}}">
        <input type="hidden" name="parent" value="{{$data->parent}}">
        
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
                                    <div class=" tab-menu-heading">
                                        <div class="tabs-menu1">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs main-nav-line">
                                                @foreach (config('app.languages') as $key=>$lang)                                            
                                                    <li class="nav-item"><a href="#{{ $key }}" class="nav-link @if ($loop->index==0) active @endif" data-toggle="tab">{{ $lang }}</a></li>
                                               @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                        <div class="tab-content">
                                            @foreach (config('app.languages') as $key=>$lang)                                            
                                                <div class="tab-pane @if ($loop->index==0) active @endif" id="{{ $key }}">
                                                    <div class="row row-sm">
                                                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10 required">title</p>
                                                            <input class="form-control" id="Text input with radiobox" type="text" name="{{ $key }}[title]" value="{{ $data->translate($key)->title }}" required>
                                                        </div>

                                                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10 ">descreption</p>
                                                            <textarea rows="10" class="form-control" name="{{ $key }}[des]" >{{ $data->translate($key)->des }}</textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
        
                                        </div>
                                    </div>
                                </div>
                            </div>

        
                        </div>
                    </div>
                </div>
            </div>
        
        </div>


        <div class="row row-sm col-lg-12">
            <div class="col-lg-12 col-md-12">
                <div class="card" id="basic-alert">
                    <div class="card-body">
                        <div>
                            <h6 class="card-title mb-1">SEO data</h6>
                        </div>
                        <div class="text-wrap">
                            <div class="example">
                                <div class="panel panel-primary tabs-style-1">
                                    <div class=" tab-menu-heading">
                                        <div class="tabs-menu1">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs main-nav-line">
                                                @foreach (config('app.languages') as $key=>$lang)                                            
                                                    <li class="nav-item"><a href="#{{ $key }}" class="nav-link @if ($loop->index==0) active @endif" data-toggle="tab">{{ $lang }}</a></li>
                                               @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                        <div class="tab-content">
                                            @foreach (config('app.languages') as $key=>$lang)                                            
                                                <div class="tab-pane @if ($loop->index==0) active @endif" id="{{ $key }}">
                                                    <div class="row row-sm">
                                                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10 required">Meta Description</p>
                                                            <textarea rows="10" class="form-control" name="{{ $key }}[m_d]" >{{ $data->translate($key)->m_d }}</textarea>
                                                        </div>

                                                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10 ">Meta Keywords</p>
                                                            <textarea rows="10" class="form-control" name="{{ $key }}[m_k]" >{{ $data->translate($key)->m_k }}</textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
        
                                        </div>
                                    </div>
                                </div>
                            </div>

        
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
