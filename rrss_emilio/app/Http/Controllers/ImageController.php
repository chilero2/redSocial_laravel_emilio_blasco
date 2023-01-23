<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class ImageController extends Controller
{
    public function form_upload_image() {
        return view('page.form-upload-image');
    }

    public function saveImage(Request $request) {

        $image_path = $request->file('image');
        $titulo = $request->input('titulo');
        $user = \Auth::user();

        $image = new Image();
        $image->user_id = $user->id;
        $image->description = $titulo;

        if($image_path) {
            $image_path_name = time().$image_path;

            Storage::disk('image')->put($image_path_name, File::get($image_path));
        }
        $image->save();

        return redirect()->route('page.form-upload-image');
    }

    public function show_images() {
        return view('page.show-images');
    }


}
