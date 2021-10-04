@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <hr>
                    <h1>Posts On CMS</h1>
                    <hr>
                        
                    @if($posts) <!--if we have users-->
                    @foreach ($posts as $post)
                        <div class="d-flex justify-content-start">
                            <div class="pr-1">
                                <h5><a href="{{ route('home.post', $post->slug) }}">{{ $post->slug }}</a></h5> 
                            </div>
                            by 
                            <div class="pl-1">
                                <h6>{{ $post->user->name }}</h6>
                            </div>
                        </div>
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
