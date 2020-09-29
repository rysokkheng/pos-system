@extends('layouts.app')

@section('content')



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

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="form-horizontal">
                  {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}


                        <div class="form-group">
                            <label class="col-sm-1 control-label">RolesName</label>
                            <div class="col-sm-5">
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','autocomplete'=>'off')) !!}
                            </div>

                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <div class="col-sm-2">
                                <strong>Roles:</strong><p></p>
                                <p>
                                @foreach($permission as $value)
                                    @if ($value->groupid == 1)
                                       <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                       {{ $value->name }}</label>
                                    @endif
                                    <p/>
                                @endforeach
                            </div>
                              <div class="col-sm-2">
                                  <strong>User:</strong><p></p>
                                  <p>
                                  @foreach($permission as $value)
                                    @if ($value->groupid == 2)
                                       <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
                                    @endif
                                  <p/>
                                  @endforeach
                              </div>
                              <div class="col-sm-2">
                                  <strong>Products:</strong><p></p>
                                  <p>
                                  @foreach($permission as $value)
                                     @if ($value->groupid == 3)
                                       <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                       {{ $value->name }}</label>
                                      @endif
                                  <p/>
                                  @endforeach
                              </div>

                          </div>
                        </div>

                         <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                               <a class="btn btn-danger" role="button" href="{{ route('roles.index') }}">Back</a>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>

                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
