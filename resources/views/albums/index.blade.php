@extends('layouts.master')
@section('content')
    @if (Auth::check())
        <h1 class="display-4 text-center mb-5">Albums</h1>
        <a href="{{ route('album_create') }}" class="btn btn-outline-success mb-3">Create new album</a>

        <div class="row" >
            @foreach ($albums as $album)
                <div class="col-4 mb-4">
                    <a href="{{ route('show_album',$album->id) }}">
                        <img class="img-thumbnail" src="storage/album_covers/{{$album->cover_image}}" alt="">
                    </a>
                    <br>
                    <h4 class="text-center text-capitalize">{{$album->name}} <span>({{ $album->photos->count() }})</span></h4>
                </div>
            @endforeach
        </div>


    @else
        <div class="jumbotron">
            <div class="container text-center">
                <h1 class="display-3">Album Photos</h1>
                <p class="lead">This is a web-app to save and create your photo albums.</p>
                <a href="{{ route('login') }}" class="btn btn-outline-success">Login</a>
            </div>


        </div>
    @endif


@endsection
