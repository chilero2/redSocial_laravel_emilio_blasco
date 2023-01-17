<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedSocialController extends Controller
{
    public function index() {
        return view('pages.welcome');
    }

    public function login() {
        return view('pages.log-in');
    }
}
