<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class ImageController extends Controller
{
    public function upload(): Factory|View|Application {
        return view('pages.form-upload-image');
    }

    public function saveImage(Request $request) {

        $image_path = $request->file('image');
        $titulo = $request->input('description');
        $user = \Auth::user();

        $image = new Image();
        $image->id_user = $user->id;
        $image->description = $titulo;

        if($image_path) {
            $image_path_name = time().$image_path->getClientOriginalName();

            Storage::disk('images_rrss')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path;
        }
        $image->save();

        return redirect()->route('dashboard');
    }

    public function show_images() {
        return view('page.show-images');
    }


}
