<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRentPricesRequest;
use App\Models\RentPrice;
use App\Models\Villa;
use Illuminate\Http\Request;

class RentPriceController extends Controller
{
    public function updatePrices(UpdateRentPricesRequest $request)
    {
        $data = $request->except("_token", "level");
        $villa = Villa::where("id", $data["villa_id"]);
        $is_exists = $villa->withCount("rentPrices");
        $is_exists = $is_exists->get()[0]->rent_prices_count;

        $level = $villa->get()[0]->level;
        $VillaController = new VillasController();
        $VillaController->updateLevel($level, $request->get("level"), $villa);


        if (!$is_exists) {
            RentPrice::where("villa_id", $data["villa_id"])->create($data);
            return response(["message" => "Rent villa prices created"], 200);
        } else {
            RentPrice::where("villa_id", $data["villa_id"])->update($data);
            return response(["message" => "Rent villa prices updated"], 200);
        }
    }
}
