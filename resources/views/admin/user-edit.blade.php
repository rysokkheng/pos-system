@extends('layouts.app')

@section('content')
    <link href="{{ asset('assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet') }}">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{__('users.formcreateuser')}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('users.index') }}">{{__('users.userinfor')}}</a>
            </li>

        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="form-horizontal">
                {!! Form::model($user, ['method' => 'PUT','enctype' => 'multipart/form-data','route' => ['users.update', $user->id]]) !!}
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-1 control-label">{{__('users.fullname')}}</label>
                            <div class="col-sm-5">
                                {!! Form::text('name', null, array('class' => 'form-control','required'=>'required','autocomplete'=>'off')) !!}
                            </div>
                            <label class="col-sm-1 control-label">{{__('users.username')}}</label>
                            <div class="col-sm-5">
                                {!! Form::text('username', null, array('class' => 'form-control','required'=>'required','autocomplete'=>'off')) !!}
                            </div>
                        </div> <br/>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">{{__('users.email')}}</label>
                            <div class="col-sm-5">
                                {!! Form::text('email', null, array('class' => 'form-control','required'=>'required','autocomplete'=>'off')) !!}
                            </div>
                            <label class="col-sm-1 control-label">{{__('users.base')}}</label>
                            <div class="col-sm-3">
                                <select name="cover_id" class="form-control">
                                    @foreach($base as $s)
                                        <option value= " {{ $s->id }} " class="form-control" > {{$s->name_en}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="gender_id" value="1"> Male
                                    </label>
                                    <label>
                                        <input type="radio" name="gender_id" value="2"> Female
                                    </label>
                                    <label>
                                        <input type="radio" name="gender_id" value="3"> Other
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br/>

                         <div class="form-group">
                            <label class="col-sm-1 control-label">{{__('users.password')}}</label>
                            <div class="col-sm-5">
                                {!! Form::password('password', array('class' => 'form-control','required'=>'required','autocomplete'=>'off')) !!}
                            </div>
                            <label class="col-sm-1 control-label">{{__('users.cfpassword')}}</label>
                            <div class="col-sm-5">
                                 {!! Form::password('confirm-password', array('class' => 'form-control','autocomplete'=>'off')) !!}
                            </div>
                        </div>
                         <br/>
                         <div class="form-group">
                            <label class="col-sm-1 control-label">{{__('users.phone')}}</label>
                            <div class="col-sm-5">
                                {!! Form::text('phone', null, array('class' => 'form-control','required'=>'required','autocomplete'=>'off')) !!}
                            </div>
                            <label class="col-sm-1 control-label">{{__('users.company')}}</label>
                            <div class="col-sm-5" >
                                {!! Form::text('company', null, array('class' => 'form-control','required'=>'required','autocomplete'=>'off')) !!}
                            </div>
                        </div>
                         <br/>
                         <div class="form-group">
                            <label class="col-sm-1 control-label">{{__('users.userinfor')}}</label>
                            <div class="col-sm-5">
                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                            </div>
                            <label class="col-sm-1 control-label">{{__('users.usersprofile')}}</label>
                            <div class="col-sm-5" >
                              <img id="preview"
                                             src="{{asset("images/".$user->img)}}" style="padding: 10px 0;" width="auto" height="200"/>
                                        {!! Form::file("profile",["class"=>"form-control","style"=>"display:none","id"=>'image']) !!}
                                        <br/>
                                        <a class="btn btn-primary" href="javascript:changeProfile();"><i class="fa fa-exchange"></i>Change</a> |
                                        <a class="btn btn-danger" href="javascript:removeImage()"><i class="fa fa-trash"></i>Remove</a>
                                        <input type="hidden" style="display: none" value="0" name="remove" id="remove">
                            </div>
                        </div>
                        <br/>
                         <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-1">
                                <a href="{{ route('users.index') }}">
                                <button class="btn btn-danger" type="button">{{__('users.cancel')}}</button></a>

                                <button class="btn btn-primary" type="submit">{{__('users.save')}}</button>
                            </div>
                        </div>

                  {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

     $('.select').chosen();

     function changeProfile() {
            $('#image').click();
        }
        $('#image').change(function () {
            var imgPath = $(this)[0].value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                readURL(this);
            else
                alert("Please select image file (jpg, jpeg, png).")
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                    $('#remove').val(0);
                }
            }
        }
        function removeImage() {
            $('#preview').attr('src', '{{url('http://placehold.it/200x200')}}');
            $('#remove').val(1);
        }
</script>

@endsection
