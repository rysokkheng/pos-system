@extends('layouts.app')

@section('content')

    <link href="{{ asset('assets/css/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/dataTables/dataTables.responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/dataTables/dataTables.tableTools.min.css') }}" rel="stylesheet">


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{__('users.usersall')}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('users.index') }}">{{__('users.users')}}</a>
            </li>
            <li class="active">
                <strong> {{__('users.userlist')}} </strong>
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
                     @can('user-create')
                    <P><a href="{{ route('users.create') }}">
                    <button type="button" class="btn btn-w-m btn-primary">{{__('users.createusers')}}</button>
                    </a></P>
                    @endcan
                </div>
 
            <table class="table table-striped table-bordered table-hover " id="editable"  style="font-size: 13px;">
            <thead>
            <tr>
                <th width="3%">{{__('users.no')}}</th>
                <th width="10%">{{__('users.username')}}</th>
                <th width="15%">{{__('users.email')}}</th>
                <th width="10%">{{__('users.phone')}}</th>
                <th width="12%">{{__('users.company')}}</th>
                <th width="13%">{{__('users.profile')}}</th>
                <th width="12%">{{__('users.createdate')}}</th>
                <th width="10%">{{__('users.roles')}}</th>
                <th width="15%">{{__('users.action')}}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $use)
            <tr class="gradeX">
                <td>{{++$key}}</td>
                <td>{{$use->name}}</td>
                <td>{{$use->email}}</td>
                <td class="center">{{$use->phone}}</td>
                <td class="center">{{$use->company}}</td>
                @if(!empty($use->img))
                  <td><a href="{{asset("images/".$use->img)}}"> <img src="{{asset("images/".$use->img)}}" class="img-circle" width="30" height="30"> </a></td>
                  @else
                  <td><img src="{{asset("images/none-bg.png")}}" class="img-circle" width="30" height="30"> </td>
              @endif
                <td class="center">{{$use->created_at}}</td>
                <td class="center">
                 @if(!empty($use->getRoleNames()))
                    @foreach($use->getRoleNames() as $v)
                       <label class="badge badge-primary">{{ $v }}</label>
                    @endforeach
                  @endif
                </td>
                <td class="center">
                     @can('user-edit')
                    <a href="{{ route('users.edit',$use->id) }}" class="btn btn-success btn-sm">
                      <span><i class="fa fa-pencil"></i></span>
                    </a>
                    @endcan
                     <a href="" class="btn btn-primary  btn-sm">
                        <span><i class="fa fa-eye"></i></span>
                    </a>
                      @can('user-delete')
                    <a href="{{ route('users.destroy',$use->id) }}"  class="btn btn-danger btn-sm">
                        <span><i class="fa fa-trash"></i></span>
                    </a>
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
