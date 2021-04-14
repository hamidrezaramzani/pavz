<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function allUsers()
    {
        $users = User::all()->sortByDesc("created_at");
        return view("pages.admin.users", ["users" => $users]);
    }



    public function newComments()
    {
        $comments = Comment::where("status", 0)->orderBy("created_at", "DESC");
        return view("pages.admin.new-comments", ["comments" => $comments->get()]);
    }

    public function rejectComments()
    {
        $comments = Comment::where("status", 2)->orderBy("created_at", "DESC");
        return view("pages.admin.reject-comments", ["comments" => $comments->get()]);
    }


    public function publishedComments()
    {
        $comments = Comment::where("status", 1)->orderBy("created_at", "DESC");
        return view("pages.admin.published-comments", ["comments" => $comments->get()]);
    }
    public function publishComment($id)
    {
        Comment::where("id", $id)->update(["status" => 1]);
        return back();
    }

    
public function rejectComment($id)
    {
        Comment::where("id", $id)->update(["status" => 2]);
        return back();
    }
}
