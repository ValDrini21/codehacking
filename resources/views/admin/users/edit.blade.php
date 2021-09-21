@extends('layouts.admin')

@section('content')

<div class="row">

    <h1>Edit User</h1>

    <div class="col-sm-3">
        <img src="{{ $user->photo ? $user->photo->file : 'https://place-hold.it/230/aaa/white&text=User%20Image' }}" alt="" class="img-responsive img-rounded">    
    </div>  

    <div class="col-sm-9">

        {!! Form::model($user ,['method'=>'PATCH', 'action' => ['App\Http\Controllers\AdminUsersController@update', $user->id], 'files' => true]) !!}
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
            {!! Form::select('role_id', $roles ,null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_active', 'Status') !!}
            {!! Form::select('is_active', ['1' => 'Active', '0' => 'Passive'], null, ['class' => 'form-control']) !!}
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
            {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
        </div> 

        {!! Form::close() !!}

    </div>
</div>    

<div class="row">
    @include('includes.form_error')  
</div>



@endsection