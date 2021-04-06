<?php

namespace App\Http\Controllers;

use App\Models\Rate;
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
            ["user_id",  $userId] , 
            ["villa_id" , $id]
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

    public function getScores($id)
    {
        $accuracyOfContent = VillaScore::where([
            "villa_id" => $id , 
            "name" => "accuracy_of_content"
        ]);
        $accuracyOfContent = $accuracyOfContent->avg("score");
        $timelyDelivery = VillaScore::where([
            "villa_id" => $id , 
            "name" => "timely_delivery"
        ]);

        $timelyDelivery = $timelyDelivery->avg("score");


        $hostEncounter = VillaScore::where([
            "villa_id" => $id , 
            "name" => "host_encounter"
        ]);

        $hostEncounter = $hostEncounter->avg("score");


        $quality = VillaScore::where([
            "villa_id" => $id , 
            "name" => "quality"
        ]);

        $quality = $quality->avg("score");



        $purity = VillaScore::where([
            "villa_id" => $id , 
            "name" => "purity"
        ]);

        $purity = $purity->avg("score");



        $address = VillaScore::where([
            "villa_id" => $id , 
            "name" => "address"
        ]);

        $address = $address->avg("score");



        
        $rates = Rate::where([
            "villa_id" => $id            
        ]);

        $rates = $rates->avg("score");


        return response([
            "accuracyOfContent" => $accuracyOfContent  , 
            "timelyDelivery" => $timelyDelivery , 
            "hostEncounter" => $hostEncounter , 
            "quality" => $quality , 
            "purity" => $purity , 
            "address" => $address , 
            "rates" => $rates
        ],200);
    }
}
