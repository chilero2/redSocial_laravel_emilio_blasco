<?php

    namespace App\Http\Controllers;

    use App\Models\Comment;
    use App\Models\Image;
    use App\Models\Like;
    use App\Models\User;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;

    class DashboardController extends Controller {
        public function index() {
            Carbon::setLocale('ES');
            $images = Image::orderBy('id', 'desc')->paginate(2);
            $carbon = new Carbon();
            return view('dashboard', ['images' => $images, 'carbon' => $carbon]);
        }

        public function perfil() {
            $user    = Auth::user();
            $images  = Image::where('user_id', $user->id)->get();
            $pending = Auth::user()->getPendingFriendships();
            $users    = User::orderBy('id', 'desc');

            return view('pages.perfil', ['user' => $user, 'images' => $images, 'pending' => $pending, 'users' =>
                $users]);
        }

        public function acceptFriend(Request $request) {
            $f = $request->input('friend');
            $friend = User::find($f);
            Auth::user()->acceptFriendRequest($friend);
            return $this->perfil();
        }


    }


