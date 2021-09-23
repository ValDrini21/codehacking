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
            @foreach ($categories as $category)    
            <tr>
                <td>{{ $category->id }}</td>
                <td><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                <td>{{ $category->created_at->diffForhumans() }}</td>
                <td>{{ $category->updated_at->diffForhumans() }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

<div class="col-sm-6">
    {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\AdminCategoriesController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Category name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'category...']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create category', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
    <div class="form-group">
        @include('includes.form_error')
    </div>
</div>

@endsection