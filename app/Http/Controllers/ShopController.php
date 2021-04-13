<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateShopAddressRequest;
use App\Http\Requests\UpdateShopRentPricingRequest;
use App\Http\Requests\UpdateShopSoldPricingRequest;
use App\Http\Requests\UpdateShopSpecification;
use App\Models\DocumentType;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function newShop()
    {
        return view("pages.shop.new-shop");
    }

    public function createShop(Request $request)
    {
        $userId = Auth::id();
        $adsType = $request->get("ads_type");


        $shop = Shop::create([
            "user_id" => $userId,
            "ads_type" => $adsType
        ]);
        return redirect("/shop/edit/" . $shop->id);
    }

    public function getCities($id)
    {
        $data = json_decode(file_get_contents(public_path("json/cities.json")));
        $data = array_filter($data, function ($value) use ($id) {
            return $value->province == $id;
        });
        return $data;
    }


    public function editShop($id = null)
    {
        if ($id == null) {
            return redirect("/panel");
        }

        $shop = Shop::where([
            ["id", $id],
            ["user_id", Auth::id()]
        ]);


        if (!$shop->get()->count()) {
            return redirect("/panel");
        }

        $documentTypes  = DocumentType::all();
        $data = Shop::where("id", $id)->get()[0];

        $states = json_decode(file_get_contents(public_path("json/states.json")));
        $cities = [];
        if ($data->state) {
            $cities = $this->getCities($data->state);
        }



        $formSteps = [
            ["icon" => "fa fa-file", "title" => "اطلاعات کلی"],
            ["icon" => "fa fa-check", "title" => "امکانات مغازه"],
            ["icon" => "fa fa-address-card", "title" => "آدرس", "id" => "address-step" , "lat" => $data->lat , "long" => $data->long],
            ["icon" => "fa fa-dollar-sign", "title" => "قیمت گذاری"],
            ["icon" => "fa fa-image", "title" => "تصاویر ملک"],
            ["icon" => "fa fa-flag-checkered", "title" => "مرحله نهایی"],
        ];

        $forms = ["specification", "possibilities", "address", "pricing", "pictures", "finish"];


        return view("pages.shop.edit-shop", [
            "states" => $states,
            "cities" => $cities,
            "state" => [$data->state, $cities, $states],
            "data" => $data,
            "documentTypes" => $documentTypes,
            "steps" => $formSteps,
            "forms" => $forms
        ]);
    }

    public function updateSpecification(UpdateShopSpecification $request)
    {
        $data = $request->except(["_token", "id"]);
        Shop::where("id", $request->get("id"))->update($data);
        return response(["message" => "shop updated"]);
    }

    public function updatePossibilities(Request $request)
    {
        $request->validate([
            "possibilities" => "required|string"
        ]);
        $data = $request->except(["_token", "id"]);
        Shop::where("id", $request->get("id"))->update($data);
        return response(["message" => "possibilities updated"]);
    }

    public function updateAddress(UpdateShopAddressRequest $request)
    {
        $data = $request->except(["_token", "id"]);
        Shop::where("id", $request->get("id"))->update($data);
        return response(["message" => "address updated"]);
    }

    public function updateRentPricing(UpdateShopRentPricingRequest $request)
    {
        $data = $request->except(["_token", "id"]);
        Shop::where("id", $request->get("id"))->update($data);
        return response(["message" => "rent price updated"]);
    }



    public function updateSoldPricing(UpdateShopSoldPricingRequest $request)
    {
        $data = $request->except(["_token", "id"]);
        Shop::where("id", $request->get("id"))->update($data);
        return response(["message" => "sold price updated"]);
    }

    public function updateShopStatus($id)
    {
        $shop = Shop::find($id);

        if ($shop->status == "not-completed" || $shop->status == "published") {
            Shop::where("id", $id)->update([
                "status" => "checking"
            ]);
        }
        return response(["message" => "status updated"], 200);
    }


    public function manageShops()
    {
        $shops = Shop::where("user_id", Auth::id());

        return view("pages.shop.manage-shops", ["data" => $shops->get()]);
    }

    public function deleteShop($id)
    {
        $user = Auth::user();
        $shop = $user->shops()->where("id", $id);
        if ($shop) {
            if ($shop->get()[0]->cover) {
                unlink(public_path("covers") . "/" . $shop->get()[0]->cover);
            }
            $pictures = Shop::find($id)->pictures()->get();
            $shop->delete();
            foreach ($pictures as $picture) {
                $picture->delete();
                unlink(public_path("shop_pictures") . "/" . $picture->url);
            }
            return response(["message" => "shop deleted"], 200);
        } else {
            return response(["message" => "shop not found"], 400);
        }
    }

    public function getShop($id = null)
    {
        
        if ($id == null) {
            return redirect("/");
        }
        $data = Shop::where([
            ["id", $id],
            ["status", "published"]
        ]);


        


        if ($data->get()->count() == 0) {
            return redirect("/");
        } else {
            $data = $data->get()[0];
        }


        
        if (!Session::get("shop-" . $data->id)) {
            Session::push("shop-" . $data->id , true);
            Shop::where("id", $id)->update(["view_count" => $data->view_count  + 1]);
        }


        $states = json_decode(file_get_contents(public_path("json/states.json")));
        $cities = json_decode(file_get_contents(public_path("json/cities.json")));



        $stateId = $data->get()[0]->state;
        $state = array_filter($states, function ($value) use ($stateId) {
            return $value->id == $stateId;
        });



        $cityId = $data->get()[0]->city;
        $city = array_filter($cities, function ($value) use ($cityId) {
            return $value->id == $cityId;
        });


        $saved = 0;
        if (Auth::check() && $data->saves()->where("user_id", Auth::id())->get()->count()) {
            $saved = 1;
        }
        


        return view("pages.shop.shop", [
            "data" =>  $data,
            "state" => $state,
            "city" => $city , 
            "saved" => $saved
        ]);
    }

}
