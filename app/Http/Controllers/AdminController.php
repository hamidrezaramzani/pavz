<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentAnswer;
use App\Models\DocumentType;
use App\Models\Notification;
use App\Models\User;
use App\Models\Villa;
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

    public function newAnswerComments()
    {

        $answers = CommentAnswer::where("status", 0)->orderBy("created_at", "DESC");
        return view("pages.admin.new-answers", ["answers" => $answers->get()]);
    }

    public function rejectedAnswers()
    {

        $answers = CommentAnswer::where("status", 2)->orderBy("created_at", "DESC");
        return view("pages.admin.rejected-answers", ["answers" => $answers->get()]);
    }



    public function publishedAnswers()
    {

        $answers = CommentAnswer::where("status", 1)->orderBy("created_at", "DESC");
        return view("pages.admin.published-answers", ["answers" => $answers->get()]);
    }


    public function publishAnswer($id)
    {
        CommentAnswer::where("id", $id)->update(["status" => 1]);
        return back();
    }

    public function rejectAnswer($id)
    {
        CommentAnswer::where("id", $id)->update(["status" => 2]);
        return back();
    }


    public function requestedVillas()
    {
        $villas = Villa::where("status", "checking")->orderBy("created_at", "DESC")->get();
        return view("pages.admin.villa.requested-villas", ["villas" => $villas]);
    }

    public function publishedVillas()
    {
        $villas = Villa::where("status", "published")->orderBy("created_at", "DESC")->get();
        return view("pages.admin.villa.published-villas", ["villas" => $villas]);
        
    }

    public function rejectedVillas()
    {
        $villas = Villa::where("status", "rejected")->orderBy("created_at", "DESC")->get();
        return view("pages.admin.villa.rejected-villas", ["villas" => $villas]);
        
    }


    public function showVilla($id = null)
    {

        if ($id == null)
            return redirect("/");

        $data =  Villa::with([
            "rooms" => function ($q) {
                return $q->orderBy("created_at", "asc");
            }, "specialPlaces", "pools" => function ($q) {
                return $q->orderBy("created_at", "asc");
            },
            "parkings" => function ($q) {
                return $q->orderBy("created_at", "asc");
            },
            "pictures", "rentPrices", "villaTypes", "documents", "soldVillaPrices",
        ]);

        $data = Villa::where([
            ["id", $id],
            ["status", "checking"]
        ]);

        if ($data->count())
            $data = $data->get()[0];
        else
            return redirect("/");



        $comments = Comment::with(["commentAnswers"])->where([
            "villa_id" => $id,
            "status" => 1
        ]);

        $documentTypes  = DocumentType::all();


        $states = json_decode(file_get_contents(public_path("json/states.json")));
        $cities = json_decode(file_get_contents(public_path("json/cities.json")));



        $stateId = $data->get()[0]->state;
        $state = array_filter($states, function ($value) use ($stateId) {
            return $value->id == $stateId;
        });



        $cityId = $data->get()[0]->city;
        $city = array_filter($cities, function ($value) use ($cityId) {
            return $value->id == $cityId;
        });


        if (!$data->get()->count()) {
            return redirect("/");
        }


        return view("pages.villa.villa", [
            "data" => $data,
            "state" => $state,
            "city" => $city,
            "documentTypes" => $documentTypes,
            "comments" => $comments->get(),
            "saved" => 0
        ]);
    }


    public function publishVilla(Request $request)
    {
        $request->validate([
            "id" => "required|numeric",
            "description" => "required|string|min:10",
            "status" => "required|string",
            "user_id" => "required|numeric"
        ]);
        Villa::where("id", $request->get("id"))->update(["status" => "published"]);
        Notification::create([
            "text" => $request->get("description"),
            "icon" => "success",
            "user_id" => $request->get("user_id"),
            "link" => "/villa/" . $request->get("id")
        ]);
        return response(["message" => "done"]);
    }

    public function rejectVilla(Request $request)
    {
        $request->validate([
            "id" => "required|numeric",
            "description" => "required|string|min:10",
            "status" => "required|string",
            "user_id" => "required|numeric"
        ]);
        Villa::where("id", $request->get("id"))->update(["status" => "rejected"]);
        Notification::create([
            "text" => $request->get("description"),
            "icon" => "danger",
            "user_id" => $request->get("user_id"),
            "link" => "/villa/" . $request->get("id")
        ]);
        return response(["message" => "done"]);
    }
}
