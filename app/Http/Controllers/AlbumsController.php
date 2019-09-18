<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use App\User;
use Illuminate\Support\Facades\Auth;
//use http\Client\Curl\User;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function homepage(){
        if (Auth::check()){
            return redirect(route('albums_list'));
        }else{
            return view('albums.index');
        }
    }

    public function index(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $albums = $user->albums;
        return view('albums.index',compact('albums','user','user_id'));
    }

    public function create(){
        return view('albums.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'cover_image' => 'image|max:1999'
        ]);
//        get_filename with extention
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

//        get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

//        get extention
        $extention = $request->file('cover_image')->getClientOriginalExtension();

//        create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extention;

//        upload image
        $path = $request->file('cover_image')->storeAs('public/album_covers',$filenameToStore);

//        create new album
        $album = new Album;
        $album->name = $request->get('name');
        $album->description = $request->get('description');
        $album->cover_image = $filenameToStore;
        $album->user_id = auth()->user()->id;

        $album->save();

        return redirect('/albums')->with('success','A new album has been created');
    }

    public function show($id){
        $album = Album::with('photos')->find($id);
        return view('albums.show')->with('album', $album);
    }

}
