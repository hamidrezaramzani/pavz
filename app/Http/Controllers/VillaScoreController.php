<?php

namespace App\Http\Controllers;

use App\Models\Villa;
use App\Models\VillaScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VillaScoreController extends Controller
{

    public function setScore($id , $score , $name)
    {

        $userId = Auth::id();
        
        $isAlreadyScored = VillaScore::where([
            ["name",  $name],
            ["user_id",  $userId]
        ])->count();
        if ($isAlreadyScored) {
            VillaScore::where([
                ["name",  $name],
                ["user_id",  $userId]
            ])->update(["score" => $score]);
            return response(["message" => "score updated"]);
        } else {
            VillaScore::create([
                "name" => $name,
                "score" => $score,
                "user_id" => $userId,
                "villa_id" => $id
            ]);
            return response(["message" => "score created"]);
        }
    }

    public function setScoreAccuracyOfContent($id, $score)
    {
        $this->setScore($id , $score , "accuracy_of_content");
    }


    public function setTimelyDelivery($id , $score)
    {
        $this->setScore($id , $score , "timely_delivery");
    }


    public function setHostEncounter($id , $score)
    {
        $this->setScore($id , $score , "host_encounter");   
    }

    public function setQuality($id , $score)
    {
        $this->setScore($id , $score , "quality");   
    }

    
    public function setPurity($id , $score)
    {
        $this->setScore($id , $score , "purity");   
    }

    public function setAddress($id , $score)
    {
        $this->setScore($id , $score , "address");   
    }
}
