@extends('dashboard.layouts.master')

@section('body')


<br />
<div class="container-fluid">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> Edit-Profile</span>
            </div>
        </div>
 
    </div>
    <!-- breadcrumb -->

    <!-- row -->
    <form method="post" enctype="multipart/form-data" action="{{ route('news.update', $News->id) }}">
    <input type="hidden" name="categories_id" value="3">

        {{ method_field('patch') }}
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

        <!-- Col -->

        
        <div class="row row-sm col-lg-12">
            <div class="col-lg-12 col-md-12">
                <div class="card" id="basic-alert">
                    <div class="card-body">
                        <div>
                            <h6 class="card-title mb-1">Basic Style Tabs</h6>
                        </div>

                        
                        <div class="row row-sm">
                            <div class="col-lg-6 mg-b-20 mg-lg-b-0">
                            <p class="mg-b-10">categories</p>
                            <select name="categories_id" id="categories_id" class="form-control" disabled>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                            </div>
    
                            <div class="col-lg-6 mg-b-20 mg-lg-b-0">
                            <p class="mg-b-10">News Cat</p>
                            <select name="cat_id" id="cat_id" class="form-control" >
                                @foreach ($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

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
                                                            <input class="form-control" id="Text input with radiobox" type="text" name="{{ $key }}[title]" required value="{{ $News->translate($key)->title }}">
                                                        </div>


                                                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10 required">Description (SEO)</p>
                                                            <textarea rows="10" class="form-control" name="{{ $key }}[des]" required>{{ $News->translate($key)->des }}</textarea>
                                                        </div>

                                                        <div class="col-lg-12 mg-b-20 mg-lg-b-0 tinymce">
                                                            <p class="mg-b-10">description</p>
                                                            <textarea class="form-control tinymce_textarea"  name="{{ $key }}[description]" cols="35" rows="10">{{ $News->translate($key)->description }}</textarea>

                                                        </div>

                                                    </div>
                                                    <div class="row row-smv" style="margin-top: 30px">

                                                        <div class="col-lg-6 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10">photo title</p>
                                                            <input class="form-control" id="Text input with radiobox" type="text" name="{{ $key }}[img_title]"  value="{{ $News->translate($key)->img_title }}">
                                                        </div>
        
                                                        <div class="col-lg-6 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10">photo alt</p>
                                                            <input class="form-control" id="Text input with radiobox" type="text" name="{{ $key }}[img_alt]"  value="{{ $News->translate($key)->img_alt }}">
                                                        </div>
        
                                                    </div>
                                                    <div class="row row-smv" style="margin-top: 30px">

                                                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10">Meta Description</p>
                                                            <textarea  class="form-control" name="{{ $key }}[m_d]" cols="35" rows="10">{{ $News->translate($key)->m_d }}</textarea>
                                                        </div>
        
                                                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">
                                                            <p class="mg-b-10">Meta Keywords</p>
                                                            <textarea class="form-control"  name="{{ $key }}[m_k]" cols="35" rows="10">{{ $News->translate($key)->m_k }}</textarea>
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


                            <div class="row row-sm">

                                <div class="col-lg-6 mg-b-20 mg-lg-b-0">
                                    <p class="mg-b-10">photo</p>
                                    <input class="form-control" id="Text input with radiobox" type="file" name="logo" accept="image/svg+xml" >
                                </div>
                                <div class="col-lg-6 mg-b-20 mg-lg-b-0">
                                    <p class="mg-b-10">&nbsp;</p>
                                    <a class="btn ripple btn-primary" data-target="#modaldemo1" data-toggle="modal" href="">View photo</a>
                                </div>
                                <div class="col-lg-6 mg-b-20 mg-lg-b-0">
                                    <p class="mg-b-10">home</p>
                                    <select class="form-control select2-no-search" name="home" id="home">
                                        <option value="1" id="1">yes</option>
                                        <option value="0" id="0">no</option>
                                        
                                    </select> 
                                </div>
                                <div class="col-lg-6 mg-b-20 mg-lg-b-0">
                                    <p class="mg-b-10">active</p>
                                    <select class="form-control select2-no-search" name="active" id="active">
                                        <option value="1" id="1">Active</option>
                                        <option value="0" id="0">Suspended</option>
                                        
                                    </select> 
                                </div>
                            </div>
        
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


<div class="modal" id="modaldemo1">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-body">
                <img src="{{ config('app.url'). $News->logo }}">
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script language="javascript1.2" >
    document.getElementById("categories_id").value = "{{$News->categories_id}}" ;
    document.getElementById("cat_id").value = "{{$News->cat_id}}" ;
    document.getElementById("active").value = "{{$News->active}}" ;
    document.getElementById("home").value = "{{$News->home}}" ;

</script>
@endpush