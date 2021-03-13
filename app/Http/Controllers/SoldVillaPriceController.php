<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSoldVillaPricesRequest;
use App\Models\SoldVillaPrice;
use App\Models\Villa;
use Illuminate\Http\Request;

class SoldVillaPriceController extends Controller
{

    public function updatePrice(UpdateSoldVillaPricesRequest $request)
    {
        $data = $request->except(["_token", "level"]);


        $villa = Villa::where("id", $data["villa_id"]);
        $is_exists = $villa->withCount("soldVillaPrices");
        $is_exists = $is_exists->get()[0]->sold_villa_prices_count;
        $level = $villa->get()[0]->level;
        $VillaController = new VillasController();
        $VillaController->updateLevel($level, $request->get("level"), $villa);

        if (!$is_exists) {
            SoldVillaPrice::create($data);
            return response(["message" => "sold villa price created"], 200);
        } else {
            SoldVillaPrice::where("villa_id", $data["villa_id"])->update($data);
            return response(["message" => "sold villa price updated"], 200);
        }
    }
}
