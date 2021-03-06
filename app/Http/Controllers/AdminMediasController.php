<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class AdminMediasController extends Controller
{
    //
    public function index() {

        $photos = Photo::all();
        return view('admin.media.index', ['photos' => $photos]);
    }

    public function create() {

        return view('admin.media.upload');
    }

    public function store(Request $request) {
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['file' => $name]);
    }

    public function destroy($id) {
        
        $photo = Photo::findOrFail($id);

        unlink(public_path() . $photo->file);

        $photo->delete();

        //return redirect('/admin/media');

    }

    public  function deleteMedia(Request $request) {

        if(isset($request->delete_single))
        {
            // dd($request->all());
            $this->destroy($request->photo);

            return redirect()->back();
        }

        if(isset($request->delete_all) && !empty($request->checkBoxArray)) {

            $photos = Photo::findOrFail($request->checkBoxArray);

            foreach($photos as $photo) {
                $photo->delete();
            }
    
            return redirect()->back();

        } else {
            
            return redirect()->back();

        }

    }
}
