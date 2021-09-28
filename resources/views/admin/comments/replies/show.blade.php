@extends('layouts.admin')

@section('content')

@if (count($replies))

<h1>Replies</h1>

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

        @foreach ($replies as $reply)
        <tr>
            <td>{{ $reply->id }}</td>
            <td>{{ $reply->author }}</td>
            <td>{{ $reply->email }}</td>
            <td>{{ $reply->body }}</td>
            <td><a href="{{ route('home.post', $reply->comment->post->id) }}">View Post</a></td>
            <td>
                @if ($reply->is_active == 1)
                    {!! Form::open(['method' => 'PATCH', 'action' => ['App\Http\Controllers\CommentRepliesController@update', $reply->id]]) !!}
                        <input type="hidden" name='is_active' value="0">
                        {!! Form::submit('Approve', ['class' => 'btn btn-success form-control']) !!}
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['method' => 'PATCH', 'action' => ['App\Http\Controllers\CommentRepliesController@update', $reply->id]]) !!}
                    <input type="hidden" name='is_active' value="1">
                    {!! Form::submit('Un-approve', ['class' => 'btn btn-warning form-control']) !!}
                {!! Form::close() !!}
                @endif
            </td>
            <td>
                {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\CommentRepliesController@destroy', $reply->id]]) !!}
                {!! Form::submit('DELETE', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            </td>
        </tr>
        @endforeach

    </tbody>

</table>

@else

<h1 class="text-center">No replies yet...</h1>
    
@endif



@endsection