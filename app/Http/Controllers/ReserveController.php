<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewReserveRequest;
use App\Models\Reserve;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    public function newReserve(NewReserveRequest $request)
    {
        $data = $request->except("_token");
        Reserve::create($data);
        return response(["message" => "reserve sended"]);
    }

    public function getReserves()
    {
        $user_id = Auth::id();
        $data = Villa::where([
            "user_id" => $user_id
        ]);

        return view("pages.villa.reserves", ["data" => $data->get()]);
    }

    public function setReserveStatus($status, $id)
    {
        if ($status != "confirm" && $status != "reject") {
            return redirect("/reserves/manage");
        }

        Reserve::where("id", $id)->update(["status" => $status]);
        // sms beraye oun yaro mire
        return redirect("/reserves/manage");
    }
}
