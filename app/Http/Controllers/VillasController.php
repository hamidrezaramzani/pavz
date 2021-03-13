<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressInfoRequest;
use App\Http\Requests\HomeInfoRequest;
use App\Http\Requests\PossiblitiesInfoRequest;
use App\Http\Requests\SpaceInfoRequest;
use App\Http\Requests\SpecificationFormRequest;
use App\Models\DocumentType;
use App\Models\Picture;
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

        $data =  Villa::with([
            "rooms" => function ($q) {
                return $q->orderBy("created_at", "asc");
            }, "specialPlaces", "pools" => function ($q) {
                return $q->orderBy("created_at", "asc");
            },
            "parkings" => function ($q) {
                return $q->orderBy("created_at", "asc");
            },
            "pictures", "rentPrices", "villaTypes", "documents", "soldVillaPrices"
        ]);
        $documentTypes  = DocumentType::all();
        $data = $data->where("id", $id)->get()[0];
        $states = json_decode(file_get_contents(public_path("json/states.json")));
        $villaTypes = VillaType::all();
        $cities = [];
        if ($data->state) {
            $cities = $this->getCities($data->state);
        }


        $formSteps = [
            ["icon" => "fa fa-file", "title" => "اطلاعات کلی"],
            ["icon" => "fa fa-home", "title" => "مشخصات ملک"],
            ["icon" => "fa fa-vote-yea", "title" => "فضای ملک"],
            ["icon" => "fa fa-check", "title" => "امکانات ملک"],
            ["icon" => "fa fa-address-card", "title" => "آدرس", "id" => "step-address"],
            ["icon" => $data->ads_type == '1' ? "fa fa-gavel" : "fa fa-file", "title" => $data->ads_type == '1' ? "قوانین و مقررات" : "اسناد و امتیازات", "id" => "rules-or-documents"],
            ["icon" => "fa fa-dollar-sign", "title" => "قیمت گذاری"],
            ["icon" => "fa fa-image", "title" => "تصاویر ملک"],
            ["icon" => "fa fa-flag-checkered", "title" => "مرحله نهایی"],
        ];

        $forms = ["specification-data", "home-info", "spaces", "possibilities", "address", "rules-documents", "pricing", "pictures", "finish-data"];

        return view("pages.villa.edit-villa", [
            "states" => $states, "villaTypes" => $villaTypes,
            "state" => [$data->state, $cities, $states],
            "data" => $data,
            "formSteps" => $formSteps,
            "forms" => $forms,
            "documentTypes" => $documentTypes,
        ]);
    }

    public function updateLevel($currentLevel, $nextLevel, $villa)
    {
        if ($currentLevel < $nextLevel) {
            $villa->update(["level" => $nextLevel]);
        }
    }

    public function updateSpecificationForm(SpecificationFormRequest $request)
    {
        $data = $request->except("_token", "level");

        $villa = Villa::where("id", $request->get("id"));
        $villa->update($data);
        $level = $villa->get()[0]->level;
        $this->updateLevel($level, $request->get("level"), $villa);
        return response(["message" => "update successfully"], 200);
    }

    public function updateHomeInfo(HomeInfoRequest $request)
    {
        $data = $request->except("_token");
        $villa = Villa::where("id", $data["id"]);
        $level = $villa->get()[0]->level;
        $villa->update($data);
        $this->updateLevel($level, $request->get("level"), $villa);
        return response(["message" => "updated"], 200);
    }

    public function updateSpaceInfo(SpaceInfoRequest $request)
    {
        $data = $request->except("_token");
        $villa = Villa::where("id", $data["id"]);
        $level = $villa->get()[0]->level;
        $villa->update($data);
        $this->updateLevel($level, $data["level"], $villa);
        return response(["message" => "updated"], 200);
    }

    public function updatePossibilitiesInfo(PossiblitiesInfoRequest $request)
    {

        $data = $request->except("_token");
        $villa = Villa::where("id", $data["id"]);
        $villa->update($data);
        $level = $villa->get()[0]->level;
        $this->updateLevel($level, $data["level"], $villa);
        return response(["message" => "updated"], 200);
    }

    public function updateAddressInfo(AddressInfoRequest $request)
    {
        $data = $request->except("_token");
        $villa = Villa::where("id", $data["id"]);
        $villa->update($data);
        $level = $villa->get()[0]->level;
        $this->updateLevel($level, $data["level"], $villa);
        return response(["message" => "updated"], 200);
    }

    public function setStatus($id = null)
    {
        $villa = Villa::where("id", $id);
        $villa->update([
            "status" => "checking"
        ]);
    }

    public function manageVillas()
    {

        $id = Auth::id();
        $villas = User::find($id)->villas()->get();
        return view("pages.villa.manage-villas", ["villas" => $villas]);
    }

    public function deleteVillas($id = null)
    {
        $user = Auth::user();
        $villa = $user->villas()->where("id", $id);
        if ($villa) {
            if ($villa->get()[0]->cover) {
                unlink(public_path("covers") . "/" . $villa->get()[0]->cover);
            }
            $pictures = Villa::find($id)->pictures()->get();
            $villa->delete();
            foreach ($pictures as $picture) {
                $picture->delete();
                unlink(public_path("villa_pictures") . "/" . $picture->url);
            }
            return response(["message" => "villa deleted"], 200);
        } else {
            return response(["message" => "villa not found"], 400);
        }
    }
}
