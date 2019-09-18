@extends('layouts.master')
@section('content')
    <h1 class="display-4 text-center mb-5 text-capitalize">Create Photo for {{ $album->name }}</h1>
    <div class="container">
        <form method="POST" action="{{ route('photo_store')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="album_id" value="{!! $album->id !!}">
            <div class="form-group">
                <label for="inputtitle">title</label>
                <input type="text" name="title" class="form-control" id="inputtitle" placeholder="my first picture">
            </div>
            <div class="form-group">
                <label for="inputsize">size</label>
                <input type="text" name="size" class="form-control" id="inputsize" placeholder="size goes here">
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <textarea type="text" name="description" rows="5" class="form-control" id="description" placeholder="Description here..."></textarea>
            </div>
            <div class="input-group mb-3">
                <div class="form-group">
                    <div class="custom-file">
                        <label for="photo">Upload photo</label>
                        <input type="file" name="photo" class="btn btn-outline-primary form-control-file" id="photo">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Photo</button>
        </form>
    </div>

@endsection
