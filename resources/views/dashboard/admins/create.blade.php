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
    <form method="post" enctype="multipart/form-data" action="{{ route('admins.store') }}">

    <div class="row row-sm">
        <!-- Col -->
            @csrf


        <!-- Col -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 main-content-label">Personal Information</div>
                   

                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label required">User Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label required">email </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label required">password</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label required">password confirmation</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password_confirmation" id="confirm_password" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label required">photo</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" name="photo" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">status</label>
                                </div>
                                <div class="col-md-9">
                            <select class="form-control select2-no-search" name="status">
                                <option value="1">Active</option>
                                <option value="0">Suspended</option>
                                
                            </select>
                        </div><!-- col-4 -->
                    </div><!-- col-4 -->
                </div><!-- col-4 -->

                    
                </div>
                <div class="card-footer text-left">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">New Account</button>
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