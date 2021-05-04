<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Area;
use App\Models\Shop;
use App\Models\Villa;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

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


    public function getCities($id)
    {
        $data = json_decode(file_get_contents(public_path("json/cities.json")));
        $data = array_filter($data, function ($value) use ($id) {
            return $value->province == $id;
        });
        return $data;
    }

    public function getLocationRecord($path, $name)
    {
        $data = json_decode(file_get_contents($path));
        $data = array_filter($data, function ($value) use ($name) {
            return trim($value->name) == $name;
        });
        return $data;
    }

    public function getStateOrCityName($name)
    {


        $states = $this->getLocationRecord(public_path("json/states.json"), trim($name));
        $cities = $this->getLocationRecord(public_path("json/cities.json"), trim($name));

        if ($states) {
            return [["state", $states[array_key_first($states)]->id]];
        }

        if ($cities) {
            return [["city", $cities[array_key_first($cities)]->id]];
        }
    }

    public function getSearchDataWithModel($data , $for)
    {
        
        $modelName = '\\App\Models\\' . $for;
        $model = new $modelName;
        return $model::where($data)->orderBy("is_vip", "DESC")->get();
    }


    
    public function getSearchData(Request $request)
    {

        
        $type = $request->get("type");
        $name = $request->get("name");
        $for = $request->get("for");
        $data = $this->getStateOrCityName($name);        
        array_push($data, ["status", "published"]);
        array_push($data, ["ads_type", $type]);

        return $this->getSearchDataWithModel($data , $for);        
    }


    public function getSearchList(Request $request)
    {
        $models = ["Villa" , "Apartment" , "Area" , "Shop"];        
        $type = $request->get("type");
        $name = $request->get("name");
        $for = $request->get("for");
        if (is_null($type) or is_null($name) or is_null($for) or !in_array($for , $models)) {
            return redirect("/");
        }

        $data = $this->getSearchData($request);
     
        
        $states = json_decode(file_get_contents(public_path("json/states.json")));
        $cities = json_decode(file_get_contents(public_path("json/cities.json")));
        $location = $this->getStateOrCityName($request->get("name"));


        $type = $location[0][0];
        $id = $location[0][1];
        $lat = "";
        $long = "";
        if ($type == "state") {
            $item = $states[$id - 1];
            $lat = $item->latitude;
            $long = $item->longitude;
        }else{
            $item = $cities[$id - 1];
            $lat = $item->latitude;
            $long = $item->longitude;
        }
        return view("pages.search-list" , ["data" => $data , "type" => $request->get("type") , "cities" => $cities , "states" => $states ,
         "name" =>$request->get("name") , 
         "for" => $request->get("for") , 
         "lat" => $lat , 
         "long" => $long
         ]);
    }

    
}
