@extends('admin.dashbord.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection



@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{ $title }}</h1>
    <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{ $title }}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            @if(isset($_SESSION['msg']))
            <div class="alert alert-info">{{ $_SESSION['msg']  }}</div>
            @php
            unset($_SESSION['msg']);
            @endphp
            @endif
            @if(isset($_SESSION['message']))
            <div class="alert alert-danger">{{ $_SESSION['message']  }}</div>
            @php
            unset($_SESSION['message']);
            @endphp
            @endif


            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Full link</th>
                                <th>Short link</th>
                                <th>views</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($links as $link)
                            <tr>
                                <td>{{ $link->id }}</td>
                                <td><a href="">{{ $link->user_id ? $link->user_id->name : 'Unknown user' }}</a></td>
                                <td><a href="{{ $link->full_url }}" target="_blank">{{ $link->full_url }}</a></td>
                                <td><a href="{{ $link->short_url }}" target="_blank">{{ $link->short_url }}</a></td>
                                <td>{{ $link->views }}</td>
                                <td>
                                    <a href="#" data-action="{{"/admin/links/". $link->id ."/delete"}}"
                                        class="btn btn-danger delete_confirmation" data-toggle="modal"
                                        data-target="#deleteModal">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Full link</th>
                                <th>Short link</th>
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
        // Delete action
</script>
@endsection