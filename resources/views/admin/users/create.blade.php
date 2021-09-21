@extends('layouts.admin')

@section('content')

<h1>Create User</h1>

{!! Form::open(['method'=>'Post', 'action' => 'App\Http\Controllers\AdminUsersController@store', 'files' => true]) !!}
<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
 <div class="form-group">
    {!! Form::label('email', 'E-Mail Address'); !!}
    {!! Form::email('email', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('role_id', 'Role') !!}
    {!! Form::select('role_id', $roles ,'s',['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('is_active', 'Status') !!}
    {!! Form::select('is_active', ['1' => 'Active', '0' => 'Passive'], 0, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('photo_id', 'Photo') !!}
    {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('confirm_password', 'Confirm Password') !!}
    {!! Form::password('confirm_password', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
</div> 

{!! Form::close() !!}

@include('includes.form_error')

@endsection