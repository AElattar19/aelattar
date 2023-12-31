@extends('dashboard.layouts.master')

@section('body')




    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('admin.all_admins')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('admin.home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.all_admins')}}</li>
                    </ol>
                </div>
                
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <h3 class="card-title">{{__('admin.all_admins')}}</h3>
            <div class="card-tools">
                <a href="{{  route('cat.create') }}" class="btn btn-primary create add-permission">
                    <i class="ti-plus"></i> {{__('admin.NewCatogery')}}
                </a>
            </div>
            <div class="card-body" >
                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>news Number</th>
                            <th>active</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
               
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->


@endsection


@push('scripts')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>



<script type="text/javascript">
    $(function () {
      
      var table = $('.yajra-datatable').DataTable({
          processing: true,
          serverSide: true,
          order:[
            ['0', 'ASC']
          ],
          ajax: "{{ route('cat.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'title', name: 'title'},
              {data: 'Number', name: 'news Number'},
              {data: 'active', name: 'active'},
              {data: 'action', name: 'action',  orderable: true,searchable: true }
          ]
      });
      
    });
  </script>


@endpush