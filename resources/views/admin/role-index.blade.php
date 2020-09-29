@extends('layouts.app')

@section('content')

    <link href="{{ asset('assets/css/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/dataTables/dataTables.responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/dataTables/dataTables.tableTools.min.css') }}" rel="stylesheet">
<style type="text/css">
    #editable  th{
        text-align: center;
    }
     #editable  td{
        text-align: center;
    }
</style>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{__('roles.roleall')}}</h2>
        <ol class="breadcrumb">

            <li>
                <a href="{{ route('roles.index') }}">{{__('roles.roles')}}</a>
            </li>
            <li class="active">
                <strong>{{__('roles.view')}} </strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<div class="wrapper wrapper-content animated fadeInRight">
 <div class="row">

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="pull-rigth">
                    @can('role-create')
                    <P><a href="{{ route('roles.create') }}">
                    <button type="button" class="btn btn-w-m btn-primary">{{__('roles.createrole')}}</button>
                    </a></P>
                     @endcan
                </div>
            <table class="table table-striped table-bordered table-hover " id="editable"  style="font-size: 13px;">
            <thead>
             <tr>
                <th width="10%">{{__('roles.no')}} </th>
                <th width="30%">{{__('roles.namelogin')}} </th>
                <th width="30%">{{__('roles.showroles')}} </th>
                <th width="20%">{{__('roles.action')}} </th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $key => $rol)
            <tr class="gradeX">
                <td>{{++$key}}</td>
                <td class="center">{{$rol->name}}</td>
                <td class="center">{{$rol->name}}</td>
                <td class="center">
                @can('role-edit')
                <a href="{{ route('roles.edit',$rol->id) }}" class="btn btn-success btn-sm"> <span><i class="fa fa-pencil"></i></span></a>
                @endcan

                <a href="" class="btn btn-warning btn-sm"><span><i class="fa fa-archive"></i></span></a>
                 @can('role-delete')
                <a href="" class="btn btn-danger btn-sm"><span><i class="fa fa-trash"></i></span></a>
                 @endcan

                </td>
            </tr>
            @endforeach



            </tbody>

            </table>

            </div>
            </div>
            </div>
            </div>
        </div>

  <!-- Mainly scripts -->
    <script src="{{ asset('assets/js/jquery-2.1.1.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/dataTables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables/dataTables.tableTools.min.js') }}"></script>

    <style>

    </style>
 <!-- Data Tables -->
    <!-- Page-Level Scripts -->
    <script>
            var oTable = $('#editable').DataTable();
    </script>

@endsection
