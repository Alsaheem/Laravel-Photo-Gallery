@extends('layouts.master')
@section('content')
    <h1 class="display-4 text-center mb-5">{{$album->name}} Pictures</h1>
    <a class="btn btn-secondary" href="/">Go Back</a>
    <a class="btn btn-primary" href="/photos/create/{{$album->id}}">Upload Photo To Album</a>
    <hr>
    <div class="row" >
        @foreach ($album->photos as $photo)
            <div class="col-3 col-md-4 col-sm-6 mb-4">
                <a href="{{ route('show_photo',$photo->id) }}">
                    <img class="img-thumbnail rounded" src="/storage/photos/{{ $album->id }}/{{$photo->photo}}" alt="not found">
                </a>
                <br>
                <h4 class="text-center text-capitalize">{{$photo->title}}</h4>
            </div>
        @endforeach
    </div>
@endsection
