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
    <form method="post" enctype="multipart/form-data" action="{{ route('article.update', $data->id) }}">

    <div class="row row-sm">
        <!-- Col -->
        @csrf
        
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
                                                        <div class="col-lg-6 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10 required">title</p>
                                                            <select name="category_id" id="categories_id" class="form-control" >
                                                                @foreach ($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10 required">title</p>
                                                            <input class="form-control" id="Text input with radiobox" type="text" name="title" value="{{ $data->title }}" required>
                                                        </div>


                                                        <div class="col-lg-12 mg-b-20 mg-lg-b-0 " style="margin-bottom: 10px">
                                                            <p class="mg-b-10 ">description</p>
                                                            <textarea class="form-control" id="mytextarea" name="des" dir="rtl" >{{ $data->des }}</textarea>
                                                        </div>

                                                        <div class="col-lg-4 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10">youtube</p>
                                                            <input class="form-control" id="Text input with radiobox" type="text" name="youtube"  >
                                                        </div>
                                                        <div class="col-lg-4 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10 required">image</p>
                                                            <input class="form-control" type="file" name="image"  required>
                                                        </div>
                                                        <div class="col-lg-2 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10">rank</p>
                                                            <select class="form-control select2-no-search" name="rank">
                                                                @for ($i = 1; $i <= 30; $i++)
                                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                                @endfor                                                                             
                                                            </select> 
                                                        </div>
                                                        <div class="col-lg-2 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10">status</p>
                                                            <select class="form-control select2-no-search" name="status">
                                                                    <option value="1">Publish</option>
                                                                    <option value="0">Un Publish</option>
                                                            </select> 
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

