<?php

namespace App\Http\Controllers;

use App\Models\TicketAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketAnswerController extends Controller
{
   public function answerTicketUser(Request $request)
   {
       TicketAnswer::create([
        "description" => $request->get("description") , 
        "user_id" => Auth::id() , 
        "type" => "user" , 
        "ticket_id" => $request->get("id")
       ]);

       return response(["message" => "ticket answer created"]);
   }
}
