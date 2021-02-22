<?php

namespace App\Http\Controllers;

use App\Models\VillaType;
use Illuminate\Http\Request;

class VillasController extends Controller
{
    public function newVilla()
    {
        $states = json_decode(file_get_contents(public_path("json/states.json")));
        $villaTypes = VillaType::all();
        return view("new-villa", ["states" => $states , "villaTypes" => $villaTypes]);
    }

    public function getCities($id)
    {
        $data = json_decode(file_get_contents(public_path("json/cities.json")));
        $data = array_filter($data , function($value) use ($id){
            return $value->province == $id;
        });
        return $data;
    }

    public function getSingleVilla()
    {
        
        // get vill from database and send it to blade
        return view("pages.villa.villa");
    }
}
