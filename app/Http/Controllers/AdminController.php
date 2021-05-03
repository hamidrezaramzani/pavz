<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Area;
use App\Models\Comment;
use App\Models\CommentAnswer;
use App\Models\DocumentType;
use App\Models\Notification;
use App\Models\Shop;
use App\Models\Ticket;
use App\Models\TicketAnswer;
use App\Models\User;
use App\Models\Villa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function allUsers()
    {
        $users = User::all()->sortByDesc("created_at");
        return view("pages.admin.users", ["users" => $users]);
    }


    public function getLastTickets()
    {
        $data = Ticket::all();
        return view("pages.admin.ticket.last-tickets", ["data" => $data]);
    }

    public function requestedShops()
    {
        $shops = Shop::where("status", "checking")->orderBy("created_at", "DESC");
        return view("pages.admin.shop.requested-shops", ["data" => $shops->get()]);
    }



    public function rejectedShops()
    {
        $shops = Shop::where("status", "rejected")->orderBy("created_at", "DESC");
        return view("pages.admin.shop.rejected-shops", ["data" => $shops->get()]);
    }



    public function publishedShops()
    {
        $shops = Shop::where("status", "published")->orderBy("created_at", "DESC");
        return view("pages.admin.shop.published-shops", ["data" => $shops->get()]);
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



    public function requestedAreas()
    {
        $areas = Area::where("status", "checking")->orderBy("created_at", "DESC");
        return view("pages.admin.area.requested-areas", ["areas" => $areas->get()]);
    }


    public function publishedAreas()
    {
        $areas = Area::where("status", "published")->orderBy("created_at", "DESC");
        return view("pages.admin.area.published-areas", ["areas" => $areas->get()]);
    }

    public function requestedApartments()
    {
        $apartments = Apartment::where("status", "checking")->orderBy("created_at", "DESC");
        return view("pages.admin.apartment.requested-apartments", ["apartments" => $apartments->get()]);
    }

    public function publishedApartments()
    {

        $apartments = Apartment::where("status", "published")->orderBy("created_at", "DESC");
        return view("pages.admin.apartment.published-apartments", ["apartments" => $apartments->get()]);
    }

    public function rejectedApartments()
    {
        $apartments = Apartment::where("status", "rejected")->orderBy("created_at", "DESC");
        return view("pages.admin.apartment.rejected-apartments", ["apartments" => $apartments->get()]);
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

    public function rejectedAreas()
    {
        $areas = Area::where("status", "rejected")->orderBy("created_at", "DESC");
        return view("pages.admin.area.rejected-areas", ["areas" => $areas->get()]);
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


    public function checkUserIsVip($id)
    {

        $user = User::find($id);
        $vip = 0;
        $date = Carbon::parse($user->expire_vip);
        $now = Carbon::now();
        $days = $date->diffInDays($now);
        if ($days > 0) {
            $vip = 1;
        }
        return $vip;
    }



    public function publishVilla(Request $request)
    {
        $request->validate([
            "id" => "required|numeric",
            "description" => "required|string|min:10",
            "status" => "required|string",
            "user_id" => "required|numeric"
        ]);
        $vip = $this->checkUserIsVip($request->get("user_id"));
        Villa::where("id", $request->get("id"))->update(["status" => "published", "is_vip" => $vip]);
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

    public function showApartment($id)
    {

        if ($id == null) {
            return redirect("/");
        }
        $data = Apartment::where([
            ["id", $id]
        ]);



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



        if ($data->get()->count() == 0) {
            return redirect("/");
        } else {
            $data = $data->get()[0];
        }



        return view("pages.apartment.apartment", [
            "data" =>  $data,
            "state" => $state,
            "city" => $city,
            "saved" => 0
        ]);
    }


    public function showArea($id)
    {


        if ($id == null) {
            return redirect("/");
        }
        $data = Area::where([
            ["id", $id]
        ]);



        $states = json_decode(file_get_contents(public_path("json/states.json")));
        $cities = json_decode(file_get_contents(public_path("json/cities.json")));




        if ($data->get()->count()) {
            $data = $data->get()[0];
        } else {
            return redirect("/");
        }

        $stateId = $data->get()[0]->state;
        $state = array_filter($states, function ($value) use ($stateId) {
            return $value->id == $stateId;
        });



        $cityId = $data->get()[0]->city;
        $city = array_filter($cities, function ($value) use ($cityId) {
            return $value->id == $cityId;
        });


        return view("pages.areas.area", [
            "data" => $data,
            "city" => $city,
            "state" => $state,
            "saved" => 0
        ]);
    }

    public function publishApartment(Request $request)
    {
        $request->validate([
            "id" => "required|numeric",
            "description" => "required|string|min:10",
            "status" => "required|string",
            "user_id" => "required|numeric"
        ]);
        $vip = $this->checkUserIsVip($request->get("user_id"));
        Apartment::where("id", $request->get("id"))->update(["status" => "published", "is_vip" => $vip]);
        Notification::create([
            "text" => $request->get("description"),
            "icon" => "success",
            "user_id" => $request->get("user_id"),
            "link" => "/apartment/" . $request->get("id")
        ]);
        return response(["message" => "done"]);
    }

    public function rejectApartment(Request $request)
    {
        $request->validate([
            "id" => "required|numeric",
            "description" => "required|string|min:10",
            "status" => "required|string",
            "user_id" => "required|numeric"
        ]);
        Apartment::where("id", $request->get("id"))->update(["status" => "rejected"]);
        Notification::create([
            "text" => $request->get("description"),
            "icon" => "danger",
            "user_id" => $request->get("user_id"),
            "link" => "/apartment/" . $request->get("id")
        ]);
        return response(["message" => "done"]);
    }


    public function publishArea(Request $request)
    {
        $request->validate([
            "id" => "required|numeric",
            "description" => "required|string|min:10",
            "status" => "required|string",
            "user_id" => "required|numeric"
        ]);
        $vip = $this->checkUserIsVip($request->get("user_id"));
        Area::where("id", $request->get("id"))->update(["status" => "published", "is_vip" => $vip]);
        Notification::create([
            "text" => $request->get("description"),
            "icon" => "success",
            "user_id" => $request->get("user_id"),
            "link" => "/area/" . $request->get("id")
        ]);
        return response(["message" => "done"]);
    }


    public function rejectArea(Request $request)
    {
        $request->validate([
            "id" => "required|numeric",
            "description" => "required|string|min:10",
            "status" => "required|string",
            "user_id" => "required|numeric"
        ]);
        Area::where("id", $request->get("id"))->update(["status" => "rejected"]);
        Notification::create([
            "text" => $request->get("description"),
            "icon" => "danger",
            "user_id" => $request->get("user_id"),
            "link" => "/area/" . $request->get("id")
        ]);
        return response(["message" => "done"]);
    }

    public function publishShop(Request $request)
    {

        $request->validate([
            "id" => "required|numeric",
            "description" => "required|string|min:10",
            "status" => "required|string",
            "user_id" => "required|numeric"
        ]);
        $vip = $this->checkUserIsVip($request->get("user_id"));
        Shop::where("id", $request->get("id"))->update(["status" => "published",  "is_vip" => $vip]);
        Notification::create([
            "text" => $request->get("description"),
            "icon" => "success",
            "user_id" => $request->get("user_id"),
            "link" => "/shop/" . $request->get("id")
        ]);
        return response(["message" => "done"]);
    }


    public function rejectShop(Request $request)
    {

        $request->validate([
            "id" => "required|numeric",
            "description" => "required|string|min:10",
            "status" => "required|string",
            "user_id" => "required|numeric"
        ]);
        Shop::where("id", $request->get("id"))->update(["status" => "rejected"]);
        Notification::create([
            "text" => $request->get("description"),
            "icon" => "danger",
            "user_id" => $request->get("user_id"),
            "link" => "/shop/" . $request->get("id")
        ]);
        return response(["message" => "done"]);
    }

    public function showShop($id)
    {

        if ($id == null) {
            return redirect("/");
        }
        $data = Shop::where([
            ["id", $id]
        ]);

        if ($data->get()->count() == 0) {
            return redirect("/");
        } else {
            $data = $data->get()[0];
        }

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

        return view("pages.shop.shop", [
            "data" =>  $data,
            "state" => $state,
            "city" => $city,
            "saved" => 0
        ]);
    }

    public function allTickets()
    {
        $data = Ticket::where("status", "new")->orderBy("created_at", "DESC")->orderBy("priority", "DESC")->get();
        return view("pages.admin.ticket.new-tickets", ["data" => $data]);
    }

    public function getTicketAndAnswer($id)
    {
        $data = Ticket::find($id);
        $answers = $data->answers();
        return view("pages.admin.ticket.answer-ticket", [
            "data" => $data,
            "answers" => $answers->orderBy("created_at", "DESC")->get()
        ]);
    }

    public function answerToTicket(Request $request)
    {
        $request->validate([
            "description" => "required|string|min:10|max:10000",
            "id" => "required|numeric",
            "status" => "required|string",
        ]);

        $ticketAnswer = TicketAnswer::create([
            "description" => $request->get("description"),
            "ticket_id" => $request->get("id"),
            "user_id" => Auth::id()
        ]);
        $ticket = Ticket::where("id", $request->get("id"));
        $ticket->update(["status" => $request->get("status")]);
        Notification::create([
            "text" => "تیکت جدید برای شما ارسال شده است",
            "icon" => "success",
            "user_id" => $ticket->get()[0]->user_id,
            "link" => "/tickets/show-answer/"  . $ticketAnswer->id
        ]);
        return response(['message' => 'send']);
    }
}
