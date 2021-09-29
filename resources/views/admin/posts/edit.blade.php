@extends('layouts.admin')

@section('content')

@include('includes.tinyeditor')

<h1>Edit Post</h1>

<div class="col-sm-3">
    <img src="{{ $post->photo ? $post->photo->file : "https://place-hold.it/200" }}" alt="" class="img-responsive img-rounded">

</div>

<div class="col-sm-9">
    <div class="row">

        {!! Form::model($post,['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminPostsController@update', $post->id], 'files' => 'true']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', $category, null, ['class' => 'form-control']) !!}
            </div>
    
            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
            </div>
    
            <div class="form-group">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '15']) !!}
            </div>
    
            <div class="form-group">
                {!! Form::submit('Update Post', ['class' => 'btn btn-primary col-sm-6']) !!}
            </div>
        {!! Form::close() !!}
    
        {!! Form::open(['method'=>'DELETE', 'action' => ['App\Http\Controllers\AdminPostsController@destroy', $post->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Post', ['class' => 'btn btn-danger col-sm-6']) !!}
            </div>
        {!! Form::close() !!}
    </div>
    
    <div class="row">
        @include('includes.form_error')
    </div>
</div>


@endsection