<?php

    namespace App\Http\Controllers;

    use App\Models\Image;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;


    class UserController extends Controller {

        public function gente() {
            $users   = User::orderBy('name', 'asc')->get();
            $friends = Auth::user()->getFriends();
            $pending = Auth::user()->getPendingFriendships();
            return view('pages.gente', ['users' => $users, 'friends' => $friends, 'pending' => $pending]);
        }

        public function search(Request $request) {
            $search = $request->input('search');
            $users  = User::where('name', 'LIKE', '%' . $search . '%')->orWhere('username', 'LIKE', '%' . $search . '%')->get();
            if ($users->isEmpty()) {
                return $this->gente();
            }
            return view('pages.gente', ['users' => $users]);
        }

        public function viewUser($user_id) {
            $user   = User::find($user_id);
            $images = Image::where('user_id', $user->id)->get();
            return view('pages.viewUser', ['user' => $user, 'images' => $images]);
        }

        public function sendFriendRequest(Request $request) {
            $f      = $request->input('friend');
            $friend = User::find($f);
            Auth::user()->befriend($friend);
            return $this->gente();
        }

        public function acceptFriend(Request $request) {
            $f = $request->input('acceptFriend');
            $friend = User::find($f);
            Auth::user()->acceptFriendRequest($friend);
            return $this->gente();
        }

        public function denyFriend(Request $request) {
            $f = $request->input('denyFriend');
            $friend = User::find($f);
            Auth::user()->denyFriendRequest($friend);
            return $this->gente();
        }




    }
