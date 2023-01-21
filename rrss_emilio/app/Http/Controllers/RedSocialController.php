<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RedSocialController extends Controller
{
    public function index(): Factory|View|Application {

        $images = Image::all();
        return view('pages.welcome', ['images' => $images]);
    }

//    public function login() {
//        return view('pages.log-in');
//    }
}
