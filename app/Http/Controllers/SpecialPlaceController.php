<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecialPlaceRequest;
use App\Models\SpecialPlace;
use App\Models\Villa;
use Illuminate\Http\Request;

class SpecialPlaceController extends Controller
{
    public function createSpecialPlaceItem(SpecialPlaceRequest $request)
    {
        $data = $request->except("_token");
        SpecialPlace::create($data);
        $specialPlaces = Villa::find($data["villa_id"])->specialPlaces()->get();
        return response($specialPlaces);
    }

    public function removeSpecialPlaceItem($id = null, $villa = null)
    {
        if ($id) {
            SpecialPlace::where("id", $id)->delete();
            $specialPlaces = Villa::find($villa)->specialPlaces()->get();
            return response($specialPlaces, 200);
        } else {
            return response(["message" => "we have an error on server"], 400);
        }
    }
}
