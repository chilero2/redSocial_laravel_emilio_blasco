<?php

    namespace App\Http\Controllers;

    use App\Models\Like;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class LikeController extends Controller {
        public function like($image_id) {
            $like           = new Like();
            $like->user_id  = Auth::id();
            $like->image_id = $image_id;
            $like->save();
            return redirect()->route('dashboard');
        }

        public function dislike($image_id) {

            $like = Like::where('image_id', $image_id)
                ->where('user_id', Auth::id());
            $like->delete();


            return redirect()->route('dashboard');
        }
    }
