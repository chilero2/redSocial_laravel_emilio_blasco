<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function gente() {
        $users = User::orderBy('name', 'desc')->get();
        return view('pages.search', ['users' => $users]);
    }
}
