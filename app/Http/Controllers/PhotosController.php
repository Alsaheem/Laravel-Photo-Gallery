<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function create($album_id){
        $album = Album::with('photos')->find($album_id);
//        dd($album);
        return view('photos.create',compact('album_id','album'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'photo' => 'image|max:1999'
        ]);
//        get_filename with extention
        $filenameWithExt = $request->file('photo')->getClientOriginalName();

//        get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

//        get extention
        $extention = $request->file('photo')->getClientOriginalExtension();

//        create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extention;

//        upload image
        $path = $request->file('photo')->storeAs('public/photos/'.$request->get('album_id'),$filenameToStore);

//        create new photo
        $photo = new Photo;
        $photo->title = $request->get('title');
        $photo->album_id = $request->get('album_id');
        $photo->size = $request->file('photo')->getSize();
        $photo->description = $request->get('description');
        $photo->photo = $filenameToStore;


        $photo->save();

        return redirect('/albums/'.$request->get('album_id'))->with('success','A new Photo has been Added');
    }

    public function show($id){
        $photo = Photo::find($id);
        return view('photos.show',compact('photo'));
    }

    public function destroy($id)
    {
        $photo = Photo::find($id);
        if (Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
            $photo->delete();
            return redirect('/')->with('status','Photo has been deleted');
        }
    }
}
