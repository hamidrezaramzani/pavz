<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function allNotifications()
    {
        $data = Notification::where("user_id", Auth::id());
        $data->update(["status" => "seen"]);
        return view("pages.notifications.all", ["data" => $data->orderBy("created_at" , "desc")->get()]);
    }
}
