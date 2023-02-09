<?php

    namespace App\Http\Controllers;

    use App\Models\Comment;
    use App\Models\Image;
    use App\Models\Like;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;

    class DashboardController extends Controller {
        public function index() {
            Carbon::setLocale('ES');
            $images = Image::orderBy('id', 'desc')->paginate(2);
            $carbon = new Carbon();
//            $comments = Comment::all();


//            $like = Like::where($image_id, $image->id)::where(Auth::user(), $image->user_id);
            return view('dashboard', ['images'=>$images, 'carbon'=>$carbon]);
        }

        public function perfil() {
            $user = Auth::user();
            $images = Image::where('user_id', $user->id)->get();

            return view('pages.perfil', ['user' => $user, 'images' => $images]);
        }
    }


