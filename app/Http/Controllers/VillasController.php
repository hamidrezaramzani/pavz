<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressInfoRequest;
use App\Http\Requests\HomeInfoRequest;
use App\Http\Requests\PossiblitiesInfoRequest;
use App\Http\Requests\SpaceInfoRequest;
use App\Http\Requests\SpecificationFormRequest;
use App\Models\SpecialPlace;
use App\Models\User;
use App\Models\Villa;
use App\Models\VillaType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VillasController extends Controller
{
    public function newVilla()
    {

        return view("pages.villa.new-villa");
    }

    public function getCities($id)
    {
        $data = json_decode(file_get_contents(public_path("json/cities.json")));
        $data = array_filter($data, function ($value) use ($id) {
            return $value->province == $id;
        });
        return $data;
    }

    public function getSingleVilla()
    {

        // get vill from database and send it to blade
        return view("pages.villa.villa");
    }

    public function createVilla(Request $request)
    {
        $villa = Villa::create([
            "ads_type" => $request->get("ads_type"),
            "user_id" => Auth::id()
        ]);

        return redirect("/edit-villa/$villa->id");
    }



    public function editVilla($id = null)
    {
        if ($id == null) {
            return redirect("/panel");
        }

        $villa = Villa::where([
            ["id", $id],
            ["user_id", Auth::id()]
        ]);

        if (!$villa) {
            return redirect("/panel");
        }

        $data =  Villa::find($id)->with([
            "rooms" => function ($q) {
                return $q->orderBy("created_at", "asc");
            }, "specialPlaces", "pools" => function ($q) {
                return $q->orderBy("created_at", "asc");
            },
            "parkings" => function ($q) {
                return $q->orderBy("created_at", "asc");
            } , 
            "pictures"
        ])->get()[0];
        $states = json_decode(file_get_contents(public_path("json/states.json")));
        $villaTypes = VillaType::all();
        $cities = [];
        if ($data->state) {
            $cities = $this->getCities($data->state);
        }

        return view("pages.villa.edit-villa", [
            "states" => $states, "villaTypes" => $villaTypes,
            "state" => [$data->state, $cities, $states],
            "data" => $data,
        ]);
    }
    public function updateSpecificationForm(SpecificationFormRequest $request)
    {
        $data = $request->except("_token");
        Villa::where("id", $request->get("id"))->update($data);
        return response(["message" => "update successfully"], 200);
    }

    public function updateHomeInfo(HomeInfoRequest $request)
    {
        $data = $request->except("_token");
        Villa::where("id", $data["id"])->update($data);
        return response(["message" => "updated"], 200);
    }

    public function updateSpaceInfo(SpaceInfoRequest $request)
    {
        $data = $request->except("_token");
        Villa::where("id", $data["id"])->update($data);
        return response(["message" => "updated"], 200);
    }

    public function updatePossibilitiesInfo(PossiblitiesInfoRequest $request)
    {

        $data = $request->except("_token");
        Villa::where("id", $data["id"])->update($data);
        return response(["message" => "updated"], 200);
    }

    public function updateAddressInfo(AddressInfoRequest $request)
    {
        $data = $request->except("_token");
        Villa::where("id", $data["id"])->update($data);
        return response(["message" => "updated"], 200);
    }
}
