<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    
    public function setScore(Request $request)
    {        
        $rate = Rate::where([
            "villa_id" => $request->get("id") , 
            "user_id" => Auth::id()
        ]);
        if ($rate->get()->count()) {
            $rate->update(["score" => $request->get("score")]);
            return response(["message" => "rated"]);
        }else{
            Rate::create([ 
                "score" => $request->get("score") , 
                "villa_id" => $request->get("id") ,
                "user_id" => Auth::id() ,

            ]);
            return response(["message" => "rated"]);
        }


    }
}
