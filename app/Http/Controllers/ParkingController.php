<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewParkingRequest;
use App\Models\Parking;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    public function newParking(NewParkingRequest $request)
    {
        $data = $request->except("_token");    
        Parking::create($data);
        return response(Parking::where("villa_id" , $data["villa_id"])->get() , 200);
    }


    public function removeParking($id , $villa_id)
    {
        Parking::where("id" , $id)->delete();
        return response(Parking::where("villa_id" , $villa_id)->get() , 200);
    }
}
