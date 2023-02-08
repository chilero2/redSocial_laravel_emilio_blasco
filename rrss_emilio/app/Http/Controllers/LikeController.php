<?php

    namespace App\Http\Controllers;

    use App\Models\Image;
    use App\Models\Like;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class LikeController extends Controller {
        public function like(Request $request) {

            $like          = new Like();
            $like->user_id = $request->input('user_id');

            $like->image_id = $request->input('image_id');

            $like->save();
            return $this->countLikes($request);
        }

        public function dislike(Request $request) {

            $image_id = $request->input('image_id');
            $user_id  = $request->input('user_id');
            $like     = Like::where('image_id', $image_id)
                ->where('user_id', $user_id);
            $like->delete();
            return $this->countLikes($request);
        }

        public function countLikes(Request $request) {
            $image_id = $request->input('image_id');
            $count    = Like::where('image_id', $image_id)->count();
            $response = [
                'count' => $count,
            ];
            return response()->json($response);

        }
    }
