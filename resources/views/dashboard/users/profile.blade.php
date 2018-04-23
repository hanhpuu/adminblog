<?php ?>
@extends('dashboard.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{ $user->name }}'s Profile</h2></div>

                <div class="panel-body">


                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        {{ $user->name }}
                    </div>


                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">E-mail</label>
                        {{ $user->email }}
                    </div>


                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Roles</label>
                        @if(!empty($user->roles))
                        @foreach($user->roles as $role)
                        <label class="label label-success">{{ $role->display_name }}</label>
                        @endforeach
                        @endif
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <img src="/storage/images/users/{{$user->profpho}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                        <form enctype="multipart/form-data" action="/dashboard/profile" method="POST">
                            <label>Update Profile Image</label>
                            <input type="file" name="profpho">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="pull-right btn btn-sm btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
