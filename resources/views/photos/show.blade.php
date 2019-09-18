@extends('layouts.master')
@section('content')
    <h3 class="display-4 text-center mb-5">{{$photo->title}}</h3>
    <h2 class="lead">{{ $photo->description }}</h2>
    <img src="/storage/photos/{{ $photo->album_id }}/{{$photo->photo}}" class="" width="400px" height="400px">
    <small> size : {{ $photo->size }} kb</small>
    <a href="/albums/{{ $photo->album_id }}" class="btn btn-outline-secondary mt-4">Back</a> <a href="" data-toggle="modal" data-target="#photoDelete" class="btn btn-outline-danger mt-4">Delete</a>
    {{--delete todo--}}
    <div class="modal fade" id="photoDelete" tabindex="-1" role="dialog" aria-labelledby="contactTitle" aria-hidden="true">
        <div class="modal-dialog font-weight-bold " role="document">
            <div class="modal-content text-danger font-weight-bolder" >
                <div class="modal-header ">
                    <h5 class="modal-title text-center" id="contactTitle">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('delete_photo',$photo->id)}}" method="post">
                    @csrf
                    {{ method_field('delete') }}
                    <div class="modal-body">

                        <input type="hidden" name="photo_id" value="" id="photo_id">
                        <div class="row">
                            <div class="col-12">
                                <p>are you sure you want to delete this image ???</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-info text-left" data-dismiss="modal">No, go back</a>
                        <button type="submit" href="" class="btn btn-danger text-left">Yes, Confirm delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--end of delete contact    --}}
@endsection
