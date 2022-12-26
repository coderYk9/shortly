@extends('admin.dashbord.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection



@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{ $title }}</h1>
    <ol class="breadcrumb">
        <li><a href="/admin/dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-cogs"></i> {{ $title }}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            @if(isset($_SESSION['msg']))
            <div class="alert alert-info">{{ $_SESSION['msg'] }}</div>
            @endif

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <a href="/admin/store/" class="btn btn-primary">Add new admin</a>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>name</th>
                                <th>User name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                            <tr>
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->username }}</td>
                                <td>
                                    <a href="/admin/{{$admin->id}}/edit/" class="btn btn-success">Edit</a>
                                    <a href="#" data-action="/admin/{{$admin->id}}/delete/"
                                        class="btn btn-danger delete_confirmation" id="delete_confirmation"
                                        data-toggle="modal" data-target="#deleteModal">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>name</th>
                                <th>User name</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

@include('admin.dashbord.delete_modal')
@endsection
@section('js')
<!-- DataTables -->
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    // Datatable
        $(function () {
            $('#datatable').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            })
        })
        $('body').on('click','#delete_confirmation',function(e){
            e.preventDefault();
            $(document).find('#delete_action').attr('action',$(this).attr('data-action'));
        });
        // Delete action
</script>
@endsection