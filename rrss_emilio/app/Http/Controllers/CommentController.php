<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function saveComment(Request $request) {
        $text_comment = $request->input('comment');
        $user_id = $request->input('user_id');
        $image_id = $request->input('image_id');

        $comment = new Comment();
        $comment->content = $text_comment;
        $comment->user_id = $user_id;
        $comment->image_id = $image_id;
        $comment->save();

        return redirect()->route('dashboard');
    }
    public function deleteComment(Request $request) {
        Comment::find($request->input('comment_id'))->delete();
        $url = $request->input('image_id');
        return redirect()->route('show_image', ['image_id' => $url]);

    }
}
