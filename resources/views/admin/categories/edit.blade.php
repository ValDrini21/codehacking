@extends('layouts.admin')

@section('content')

<h1>Categories</h1>

<div class="col-sm-6">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>   
                <th>Created</th>
                <th>Updated</th>       
            </tr>
        </thead>
        <tbody>
            @if($categories) 
            @foreach ($categories as $cat)    
            <tr>
                <td>{{ $cat->name }}</td>
                <td><a href="{{ route('categories.edit', $cat->id) }}">{{ $cat->name }}</a></td>
                <td>{{ $cat->created_at->diffForhumans() }}</td>
                <td>{{ $cat->updated_at->diffForhumans() }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

<div class="col-sm-6">
    {!! Form::model($category,['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminCategoriesController@update', $category->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Category name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update category', ['class' => 'btn btn-primary col-sm-6']) !!}
        </div>
    {!! Form::close() !!}

    <div class="form-group">
        {!! Form::open(['method'=>'DELETE', 'action' => ['App\Http\Controllers\AdminCategoriesController@update', $category->id]]) !!}
        {!! Form::submit('Delete Category', ['class' => 'btn btn-danger col-sm-6']) !!}
    </div>
    <div class="form-group">
        @include('includes.form_error')
    </div>
</div>



@endsection