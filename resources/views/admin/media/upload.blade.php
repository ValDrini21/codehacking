@extends('layouts.admin')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" class="rel">

@endsection

@section('content')

<h1>Upload Media</h1>

{!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\AdminMediasController@store', 'class' => 'dropzone']) !!}
{!! Form::close() !!}

@endsection


@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

@endsection