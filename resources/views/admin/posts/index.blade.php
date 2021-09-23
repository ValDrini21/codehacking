@extends('layouts.admin')

@section('content')

<h1>Posts</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>     
            <th>Created</th>
            <th>Updated</th>       
        </tr>
    </thead>
    <tbody>
        @if($posts) <!--if we have users-->
        @foreach ($posts as $post)
            
        <tr>
            <td>{{ $post->id }}</td>
            {{-- <td><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td> --}}
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->category ? $post->category->name : "Uncategorized"}}</td>
            <td><a href="{{ route('posts.edit', $post->id) }}"><div class="img-responsive img-rounded"><img src="{{ $post->photo ? $post->photo->file : "https://place-hold.it/74" }}" alt="" width="84px"></div></a></td>
            <td><a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a></td>
            <td>{{ Str::limit($post->body, 11)  }}</td>
            <td>{{ $post->created_at->diffForHumans() }}</td>
            <td>{{ $post->updated_at->diffForHumans() }}</td>
        </tr>

        @endforeach
        @endif
    </tbody>
</table>

@endsection