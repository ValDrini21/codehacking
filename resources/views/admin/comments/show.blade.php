@extends('layouts.admin')

@section('content')

@if (count($comments))

<h1>Comments</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($comments as $comment)
        <tr>
            <td>{{ $comment->id }}</td>
            <td>{{ $comment->author }}</td>
            <td>{{ $comment->email }}</td>
            <td>{{ $comment->body }}</td>
            <td><a href="{{ route('home.post', $comment->post->slug) }}">View Post</a></td>
            <td><a href="{{ route('replies.show', $comment->id) }}">Replies</a></td>
            <td>
                @if ($comment->is_active == 0)
                    {!! Form::open(['method' => 'PATCH', 'action' => ['App\Http\Controllers\PostCommentsController@update', $comment->id]]) !!}
                        <input type="hidden" name='is_active' value="1">
                        {!! Form::submit('Approve', ['class' => 'btn btn-success form-control']) !!}
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['method' => 'PATCH', 'action' => ['App\Http\Controllers\PostCommentsController@update', $comment->id]]) !!}
                    <input type="hidden" name='is_active' value="0">
                    {!! Form::submit('Un-approve', ['class' => 'btn btn-warning form-control']) !!}
                {!! Form::close() !!}
                @endif
            </td>
            <td>
                {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\PostCommentsController@destroy', $comment->id]]) !!}
                {!! Form::submit('DELETE', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            </td>
        </tr>
        @endforeach

    </tbody>

</table>

@else

<h1 class="text-center">No comments yet...</h1>
    
@endif



@endsection