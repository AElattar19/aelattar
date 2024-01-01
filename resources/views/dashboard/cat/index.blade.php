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
            <div class="card-header">
                <h3 class="card-title">{{__('admin.all_admins')}}</h3>
                <div class="card-tools">
                    <a href="{{  route('category.create') }}" class="btn btn-primary create add-permission">
                        <i class="ti-plus"></i> {{__('admin.NewsCatogery')}}
                    </a>
 
                </div>
            </div>
            <div class="card-body" >
                
                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>checkbox</th>
                            <th>title</th>
                            <th>article</th>
                            <th>status</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <input type="button" class="btn btn-warning" onclick='selects()' value="Select All"/>  
                <input type="button" class="btn btn-primary" onclick='deSelect()' value="Deselect All"/>  
                <input type="submit" id="submitButton" class="btn btn-danger" value="Delete All"/> 
                </form>                
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
          ajax: "{{ route('category.index') }}",
          columns: [
              {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
              {data: 'title', name: 'title'},
              {data: 'article', name: 'article'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action',  orderable: true,searchable: true }
          ]
      });
      
    });


    
    $(document).ready(function() {
    // عند النقر على زر الإرسال
    $("#submitButton").on("click", function() {
        // التحقق من أن خانة اختيار واحدة على الأقل محددة
        if ($("input[type=checkbox]:checked").length === 0) {
            // إظهار رسالة خطأ
            alert("you must select At least one of the checkboxes");
            // منع إرسال النموذج
            return false;
        }
    });
}); 

function selects(){  
var ele=document.getElementsByName('ids[]');  
for(var i=0; i<ele.length; i++){  
    if(ele[i].type=='checkbox')  
        ele[i].checked=true;  
}  
}  
function deSelect(){  
    var ele=document.getElementsByName('ids[]');  
    for(var i=0; i<ele.length; i++){  
        if(ele[i].type=='checkbox')  
            ele[i].checked=false;  
            
    }  
}
  </script>


@endpush