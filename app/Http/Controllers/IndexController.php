<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Area;
use App\Models\Shop;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index()
    {


        $states = json_decode(file_get_contents(public_path("json/states.json")));
        $cities = json_decode(file_get_contents(public_path("json/cities.json")));

        $villas = Villa::where([
            ["is_vip", 1],
            ["status", "published"]
        ]);
        $apartments = Apartment::where([
            ["is_vip", 1],
            ["status", "published"]
        ]);

        $areas = Area::where([
            ["is_vip", 1],
            ["status", "published"]
        ]);
        $shops = Shop::where([
            ["is_vip", 1],
            ["status", "published"]
        ]);
        return view('index', [
            "villas" => $villas->get(),
            "apartments" => $apartments->get(),
            "areas" => $areas->get(),
            "shops" => $shops->get(),
            "states" => $states,
            "cities" => $cities
        ]);
    }
}
