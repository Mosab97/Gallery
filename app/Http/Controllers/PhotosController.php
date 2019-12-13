<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function __construct()
    {
        $this->path = 'photos';
    }
    // public function index()
    // {
    //     $albums = Album::all();
    //     return view($this->path . '.index', [
    //         'albums' => $albums
    //     ]);
    // }
    public function create($album_id)
    {
        return view($this->path . '.create',[
            'album_id' => $album_id
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->album_id);
        $this->validate($request, [
            'title' => 'required',
            // max file size = 1999
            'photo' => 'image|max:1999'
        ]);
        // Get filename with extension
        $filenameWithExtention =  $request->file('photo')->getClientOriginalName();
        // Get just the filename
        $filename = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
        // Get just the Extension
        $extension = $request->file('photo')->getClientOriginalExtension();
        // Create new file name
        $filenameToStore = $filename . '_' . time() . '.' . $extension;
        // Upload photo
        // الان هاي هترفعلي الصورة ف المسار التالي
        // هنا هننشا لكل البوم مجلد خاص فيه بالشكل التالي:

        $path = $request->file('photo')->storeAs('public/photos' . '/'. $request->album_id, $filenameToStore);
        $photo = Photo::create([
            'Album_id' => $request->album_id,
            'title' => $request->title,
            'description' => $request->description,
            'size' => $request->file('photo')->getClientSize(),
            'photo' => $filenameToStore,
        ]);
        return redirect(route('album.show',$request->album_id))->with('success', 'Photo Uploaded');
    }

    public function show($id)
    {
        try {
            $photo = Photo::findOrFail($id);
            return view($this->path . '.show', [
                'photo' => $photo
            ]);
        } catch (QueryException $queryException) {
            return 'error';
        }
    }


    public function destroy($id)
    {
        try {
            $photo = Photo::findOrFail($id);
            if(Storage::delete('public/photos/' . $photo->Album_id . '/' . $photo->Photo))
            {
                $photo->delete();
            }
            return redirect(route('album.show',$photo->Album_id))->with('success', 'Photo Deleted');

        } catch (QueryException $queryException) {
            return 'error';
        }
    }


}
