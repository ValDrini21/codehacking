@extends('layouts.admin')

@section('content')
<h1>Admin</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>     
            <th>Created</th>
            <th>Updated</th>       
        </tr>
    </thead>
    <tbody>
        @if($users) <!--if we have users-->
        @foreach ($users as $user)
            
        <tr>
            <td>{{ $user->id }}</td>
            <td><div class="img-responsive img-rounded"><img src="{{ $user->photo ? $user->photo->file : "https://place-hold.it/74" }}" alt="" width="74" height="64px"></div></td>
            <td><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name }}</td>
            <td>{{ $user->is_active == 1 ? 'Active' : 'Passive' }}</td>
            <td>{{ $user->created_at->diffForHumans() }}</td>
            <td>{{ $user->updated_at->diffForHumans() }}</td>
        </tr>

        @endforeach
        @endif
    </tbody>
</table>

<h2 class="alert alert-success">{{ $users[0]->name}}</h2>

@endsection