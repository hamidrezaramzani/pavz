<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{

    public function newTicket()
    {
        $data = Ticket::where("user_id", Auth::id());
        return view("pages.ticket.new");
    }

    public function createTicket(CreateTicketRequest $request)
    {
        $data = $request->except(["_token", "attach"]);
        $file =  $request->file("attach");

        $fileName = null;
        if ($file) {
            $fileName = time() . rand(1, 9999) . '.' . $file->extension();
            $file->move(public_path("tickets"), $fileName);
        }

        $data["attach"] = $fileName;
        $data["user_id"] = Auth::id();     
        
        Ticket::create($data);
        return response(["message" => "ticket created"]);
    }
}
