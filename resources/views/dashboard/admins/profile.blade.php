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
    <form method="post" action="{{ route('admins.update', auth()->guard('web')->user()->id )}}" enctype="multipart/form-data">

    <div class="row row-sm">
        <!-- Col -->
		{{ method_field('patch') }}
		{{ csrf_field() }}
			<input type="hidden" name="status" value="{{ auth()->guard('web')->user()->status }}">
            <input type="hidden" name="is_admin" value="{{ auth()->guard('web')->user()->is_admin }}">
        <div class="col-lg-3">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="pl-0">
                        <div class="main-profile-overview">
                            <div class="main-img-user profile-user">
                                <img alt="" src="{{ DisplayMedia(auth()->guard('web')->user(), 'Avatar') }}">
                              
                            </div>

                            <!--skill bar-->
                        </div><!-- main-profile-overview -->
                    </div>
                </div>
            </div>

        </div>

        <!-- Col -->
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 main-content-label">Personal Information</div>
                   

                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="form-label required">User Name</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control"  placeholder="{{ auth()->guard('web')->user()->name }}" name="name" value="{{ auth()->guard('web')->user()->name }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="form-label required">email </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="email" class="form-control"  placeholder="{{ auth()->guard('web')->user()->email }}" name="email" value="{{ auth()->guard('web')->user()->email }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="form-label">password</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control"  name="password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="form-label">photo</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="photo">
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="form-label">status</label>
                                </div>
                            <div class="col-md-10">
                                <select class="form-control select2-no-search" name="status" id="status" disabled>
                                    <option value="1" id="1">Active</option>
                                    <option value="0" is="0">Suspended</option>
                                    
                                </select>
                             </div><!-- col-4 -->
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="form-label">is_admin</label>
                                </div>
                            <div class="col-md-10">
                                <select class="form-control select2-no-search" name="is_admin" id="is_admin" disabled>
                                    <option value="1" id="1">Active</option>
                                    <option value="0" is="0">Suspended</option>
                                    
                                </select>
                             </div><!-- col-4 -->
                            </div>
                        </div>


                    
                </div>
                <div class="card-footer text-left">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile</button>
                </div>
            </div>
        </div>
        <!-- /Col -->
   
    </div>
</form>
    <!-- row closed -->
</div>

@endsection

@push('scripts')
<script type="text/javascript">$('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });  </script>

@endpush