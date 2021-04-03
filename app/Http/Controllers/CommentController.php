<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function newComment(NewCommentRequest $request)
    {
        $data = $request->except(["_token"]);
        $data["user_id"] = Auth::id();
        Comment::create($data);
        return response(["message" => "comment created"]);
    }
}
