<?php

    namespace App\Http\Controllers;

    use App\Models\Comment;
    use App\Models\Image;
    use App\Models\Like;
    use Carbon\Carbon;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Auth;


    class ImageController extends Controller {
        public function upload() {
            return view('pages.form-upload-image');
        }

        public function saveImage(Request $request) {

            $image_path = $request->file('image');
            $titulo     = $request->input('description');
            $user       = Auth::id();

            $image              = new Image();
            $image->user_id     = $user;
            $image->description = $titulo;

            if ($image_path) {
                $image_path_name = time() . $image_path->getClientOriginalName();

                Storage::disk('images_rrss')->put($image_path_name, File::get($image_path));
                $image->image_path = $image_path_name;
            }
            $image->save();

            return redirect()->route('dashboard');
        }

                public function show_images() {

                    return view('page.dashboard');
                }

        public function show_image($image_id) {
            $image = Image::find($image_id);
            Carbon::setLocale('ES');
            $carbon = new Carbon();


            return view('pages.show_image', ['image' => $image, 'carbon' => $carbon, 'like', $like]);

        }


    }
