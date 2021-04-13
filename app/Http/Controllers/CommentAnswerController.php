<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewCommentAnswerRequest;
use App\Models\CommentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentAnswerController extends Controller
{
    public function newAnswer(NewCommentAnswerRequest $request)
    {
        $data = $request->except(["_token"]);
        $data["user_id"] = Auth::id();
        CommentAnswer::create($data);
        return response(["message" => "comment answer created"], 200);
    }

    public function deleteAnswer($id = null)
    {
        if ($id) {
            $answer = CommentAnswer::where([
                ["id", $id],
                ["user_id", Auth::id()]
            ]);
            $answer->delete();
            return response(["message" => "answer deleted"], 200);
        } else {
            return response(["message" => "answer deleting failed"], 400);
        }
    }
}
