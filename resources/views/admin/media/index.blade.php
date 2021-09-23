@extends('layouts.admin')

@section('content')

<h1>Media</h1>

@if ($photos)
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Media</td>
            <td>Name</td>
            <td>Created</td>
            <td>Updated</td>
        </tr>
    </thead>
    <tbody>

        @foreach ($photos as $photo)
            <tr>
                <td>{{ $photo->id }}</td>
                <td><img src="{{ $photo->file  }}" alt="" width="74px" class="img-responsive"></td>
                <td>{{ media_name_manipulation($photo->file, '/images/') }}</td> <!-- my costum func -->
                <td>{{ $photo->created_at ? $photo->created_at : "-no-date-" }}</td>
                <td>{{ $photo->updated_at ? $photo->updated_at : "-no-date-" }}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\AdminMediasController@destroy', $photo->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endif



@endsection