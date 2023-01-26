<?php

    namespace App\Http\Controllers;

    use App\Models\Image;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    class DashboardController extends Controller {
        public function index() {
            $images = Image::orderBy('id', 'desc')->paginate(3);
            $carbon = new Carbon();


            return view('dashboard', ['images'=>$images, 'carbon'=>$carbon]);
        }
    }
