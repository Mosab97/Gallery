<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function __construct()
    {
        $this->path = 'albums';
    }
    public function index()
    {
        $albums = Album::all();
        return view($this->path . '.index', [
            'albums' => $albums
        ]);
    }
    public function create()
    {
        return view($this->path . '.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            // max file size = 1999
            'cover_image' => 'image|max:1999'
        ]);
        // Get filename with extension
        $filenameWithExtention =  $request->file('cover_image')->getClientOriginalName();
        // Get just the filename
        $filename = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
        // Get just the Extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        // Create new file name
        $filenameToStore = $filename . '_' . time() . '.' . $extension;
        // Upload image
        // الان هاي هترفعلي الصورة ف المسار التالي
        $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);
        $album = Album::create([
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => $filenameToStore,
        ]);
        return redirect(route('album.index'))->with('success', 'Album created');
    }

    // show all imgs for that album =>

    public function show($id)
    {
        try {
            $album = Album::with('photos')->findOrFail($id);
            return view($this->path . '.show', [
                'albums' => $album
            ]);
        } catch (QueryException $queryException) {
            return 'error';
        }
    }
}
