@extends('layouts.master')
@section('content')
    <h3 class="display-4">Create Album</h3>
    <form method="POST" action="{{ route('album_store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" name="name" class="form-control" id="inputName" placeholder="John Doe">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" name="description" rows="5" class="form-control" id="description" placeholder="Description here..."></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="form-group">
                <div class="custom-file">
                    <label for="coverphoto">Upload Cover Image</label>
                    <input type="file" name="cover_image" class="btn btn-outline-primary form-control-file" id="coverphoto">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create Album</button>
    </form>
@endsection
