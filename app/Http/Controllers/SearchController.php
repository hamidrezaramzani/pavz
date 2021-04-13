<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Area;
use App\Models\Shop;
use App\Models\Villa;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function getStateName($id)
    {

        $states = json_decode(file_get_contents(public_path("json/states.json")));
        $state = array_filter($states, function ($value) use ($id) {
            return $value->id == $id;
        });
        return $state[$id - 1]->name;
    }

    public function getLocations($text = null)
    {
        $cities = json_decode(file_get_contents(public_path("json/cities.json")));
        $cities = array_filter($cities, function ($value) use ($text) {
            return str_contains(trim($value->name), $text);
        });
        $cities = array_map(function ($item) {
            $item->state = $this->getStateName($item->province);
            return $item;
        }, $cities);

        $states = json_decode(file_get_contents(public_path("json/states.json")));
        $states = array_filter($states, function ($value) use ($text) {
            return str_contains(trim($value->name), $text);
        });

        return response(["data" => array_merge($states, $cities)]);
    }


    public function getVilla($id, $location, $type)
    {
        $location = array($location => $id);

        return Villa::where([
            ["status", "published"],
            ["ads_type", $type],
            ["estate_type", 1],
            [$location]
        ]);
    }



    public function getApartment($id, $location, $type)
    {
        $location = array($location => $id);
        return Apartment::where([
            ["status", "published"],
            ["ads_type", $type],
            [$location],
        ]);
    }


    public function getShop($id, $location, $type)
    {
        $location = array($location => $id);
        return Shop::where([
            ["status", "published"],
            ["ads_type", $type],
            [$location]
        ]);
    }

    public function getSuite($id, $location, $adsType)
    {
        $location = array($location => $id);
        return Villa::where([
            ["status", "published"],
            [$location],
            ["estate_type", 2],
            ["ads_type", $adsType]
        ]);
    }

    public function getData($type, $location, $id)
    {
        switch ($type) {
            case 1:
                return $this->getVilla($id, $location, 2);
                break;
            case 2:
                return $this->getVilla($id, $location, 1);
                break;
            case 3:
                return $this->getSuite($id, $location, 1);
                break;
            case 4:
                return $this->getSuite($id, $location, 2);
                break;
            case 5:
                return  $this->getApartment($id, $location, 1);
                break;
            case 6:
                return  $this->getApartment($id, $location, 2);
                break;
            case 7:
                $location = array($location => $id);
                return Area::where([
                    ["status", "published"],
                    [$location],
                ]);
                break;

            case 8:
                return $this->getShop($id, $location, 1);
                break;
            case 9:
                return $this->getShop($id, $location, 2);
                break;
            default:
                return $this->getVilla($id, $location, 2);

                break;
        }
    }

    public function getSearchData(Request $request)
    {
        $name = $request->get("name");
        $type = $request->get("type");


        $states = json_decode(file_get_contents(public_path("json/states.json")));
        $state = array_filter($states, function ($value) use ($name) {
            return trim($value->name) == $name;
        });

        $cities = json_decode(file_get_contents(public_path("json/cities.json")));
        $city = array_filter($cities, function ($value) use ($name) {
            return trim($value->name) == $name;
        });


        if (!$city && !$state) {
            return redirect("/");
        }

        if ($type <= 0 || $type > 9) {
            return redirect("/");
        }

        

        if ($state) {
            $state = $state[array_key_first($state)];
            $data = $this->getData($type, "state", $state->id);
            return view("pages.search-list", [
                "data" => $data->orderBy('is_vip' , 'DESC')->get(),
                "lat" => $state->latitude,
                "long" => $state->longitude,
                "type" => $type,
                // "state" => $state,
                // "city" => $city[array_key_first($city)]
            ]);
        } else if ($city) {
            $city = $city[array_key_first($city)];
            $data = $this->getData($type, "city", $city->id);
            return view("pages.search-list", [
                "data" => $data->orderBy('is_vip' , 'DESC')->get(),
                "lat" => $city->latitude,
                "long" => $city->longitude,
                "type" => $type,
                // "state" => $state[array_key_first($state)],
                // "city" => $city
            ]);
        } else {
            return redirect("/");
        }
    }


    public function getAllData($type = 1)
    {
        switch ($type) {
            case 1:
                $data = Villa::with(["soldVillaPrices"])->where([
                    ["ads_type", 2],
                    ["status", "published"],
                    ["estate_type", 1]
                ]);
                return [
                    "data" => $data->get(),
                    "type" => 1
                ];
                break;

            case 2:
                $data = Villa::with(["rentPrices"])->where([
                    ["ads_type", 1],
                    ["status", "published"],
                    ["estate_type", 1]
                ]);
                return [
                    "data" => $data->get(),
                    "type" => 2
                ];
                break;

            case 3:
                $data = Villa::with(["soldVillaPrices"])->where([
                    ["ads_type", 2],
                    ["status", "published"],
                    ["estate_type", 2]
                ]);
                return [
                    "data" => $data->get(),
                    "type" => 3
                ];
                break;

            case 4:
                $data = Villa::with(["rentPrices"])->where([
                    ["ads_type", 2],
                    ["status", "published"],
                    ["estate_type", 2]
                ]);
                return [
                    "data" => $data->get(),
                    "type" => 4
                ];
                break;

            case 5:
                $data = Apartment::where([
                    ["ads_type", 1],
                    ["status", "published"]
                ]);
                return [
                    "data" => $data->get(),
                    "type" => 5
                ];

                break;
            case 6:
                $data = Apartment::where([
                    ["ads_type", 2],
                    ["status", "published"]
                ]);
                return [
                    "data" => $data->get(),
                    "type" => 6
                ];
                break;
            case 7:
                $data = Area::where([
                    ["status", "published"],
                ]);
                return [
                    "data" => $data->get(),
                    "type" => 7
                ];
                break;
            case 8:

                $data = Shop::where([
                    ["status", "published"],
                    ["ads_type", 1],
                ]);
                return [
                    "data" => $data->get(),
                    "type" => 8
                ];
                break;
            case 9:
                $data = Shop::where([
                    ["status", "published"],
                    ["ads_type", 2],
                ]);
                return [
                    "data" => $data->get(),
                    "type" => 9
                ];
                break;
        }
    }
}
