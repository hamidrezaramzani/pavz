<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Area;
use App\Models\Save;
use App\Models\Shop;
use App\Models\Villa;
use Hamcrest\Core\IsSame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveController extends Controller
{

    public function save($item)
    {
        $userId = Auth::id();
        $isSave = $item->saves()->where("user_id", $userId);

        $save = new Save([
            "user_id" => $userId
        ]);

        if (!$isSave->count()) {
            $save->saveable()->associate($item);
            $save->save();
            return response(["action" => "save"]);
        } else {
            $isSave->get()[0]->delete();
            return response(["action" => "delete"]);
        }
    }

    public function saveAds($type, $id)
    {
        switch ($type) {
            case "villa": {

                    $villa = Villa::find($id);
                    return $this->save($villa);
                }
                break;

            case "apartment": {
                    $apartment = Apartment::find($id);
                    return $this->save($apartment);
                }
                break;
            case "area": {
                    $area = Area::find($id);
                    return $this->save($area);
                }
                break;
            case "shop": {
                    $shop = Shop::find($id);
                    return $this->save($shop);
                }
                break;
        };
        // $picture = new Picture([
        //     "url" => $fileName
        // ]);
        // $picture->pictureable()->associate($villa);
        // $picture->save();
    }
}
