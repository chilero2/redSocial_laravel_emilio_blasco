<?php

    namespace App\Http\Controllers;

    use App\Models\Comment;
    use App\Models\Image;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    class DashboardController extends Controller {
        public function index() {
            Carbon::setLocale('ES');
            $images = Image::orderBy('id', 'desc')->paginate(1);
            $carbon = new Carbon();
//            $comments = Comment::all();


            return view('dashboard', ['images'=>$images, 'carbon'=>$carbon]);
        }
    }
