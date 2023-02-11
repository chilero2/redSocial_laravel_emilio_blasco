<?php

    namespace App\Http\Controllers;

    use App\Models\Image;
    use App\Models\User;
    use Illuminate\Http\Request;

    class UserController extends Controller {
        public function gente() {
            $users = User::orderBy('name', 'asc')->get();
            return view('pages.gente', ['users' => $users]);
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
            $user = User::find($user_id);
            $images = Image::where('user_id', $user->id)->get();
            return view('pages.viewUser', ['user' => $user, 'images' => $images]);
        }
    }
