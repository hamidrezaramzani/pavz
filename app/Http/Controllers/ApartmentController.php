<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateApartmentAddressRequest;
use App\Http\Requests\UpdatePossibilitiesRequest;
use App\Http\Requests\UpdateRentPricingRequest;
use App\Http\Requests\UpdateSoldPricingRequest;
use App\Http\Requests\UpdateSpecificationRequest;
use App\Models\Apartment;
use App\Models\ApartmentAccountTypes;
use App\Models\ApartmentTypes;
use App\Models\DocumentType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{

    public function newApartment()
    {
        return view("pages.apartment.new-apartment");
    }

    public function createApartment(Request $request)
    {
        $id = Auth::id();
        $type = $request->get("ads_type");
        $apartment = Apartment::create([
            "user_id" => $id,
            "ads_type" => $type
        ]);

        return redirect("/edit-apartment/$apartment->id");
    }

    public function editApartment($id = null)
    {
        if ($id == null) {
            return redirect("/manage-apartments");
        }


        $formSteps = [
            ["icon" => "fa fa-file", "title" => "اطلاعات کلی"],
            ["icon" => "fa fa-tools", "title" => "امکانات"],
            ["icon" => "fa fa-map", "title" => "آدرس", "id" => "address-step"],
            ["icon" => "fa fa-dollar-sign", "title" => "قیمت گذاری"],
            ["icon" => "fa fa-image", "title" => "تصاویر ملک"],
            ["icon" => "fa fa-flag-checkered", "title" => "مرحله نهایی"],
        ];


        $forms = ["specification", "possibilities", "address", "pricing", "pictures", "finish"];

        $data = Apartment::where("id", $id);
        if ($data->get()->count() == 0) {
            return redirect("/manage-apartments");
        }
        $documentTypes = DocumentType::all();
        $accountTypes = ApartmentAccountTypes::all();
        $apartmentTypes = ApartmentTypes::all();
        $apartment = $data->get()[0];
        if ($apartment->user_id != Auth::id()) {
            return redirect("/manage-apartments");
        }

        $states = json_decode(file_get_contents(public_path("json/states.json")));
        $cities = json_decode(file_get_contents(public_path("json/cities.json")));
        return view("pages.apartment.edit-apartment", [
            "data" => $apartment,
            "states" => $states, "cities" => $cities, "documentTypes" => $documentTypes, "accountTypes" => $accountTypes, "apartmentTypes" => $apartmentTypes,
            "formSteps" => $formSteps,
            "forms" => $forms
        ]);
    }

    public function getHomeTypes($aid)
    {
        $data = ApartmentTypes::where("atype_id", $aid)->get();
        return response($data, 200);
    }

    public function updateLevel($currentLevel, $nextLevel, $apartment)
    {
        if ($currentLevel < $nextLevel) {
            $apartment->update(["level" => $nextLevel]);
        }
    }


    public function updateSpecification(UpdateSpecificationRequest $request)
    {
        $data = $request->except("_token", "aid");
        $apartment = Apartment::where("id", $request->get("aid"));
        $level = $apartment->get()[0]->level;
        $this->updateLevel($level, $request->get("level"), $apartment);
        $apartment->update($data);
        return response(["message" => "update successfuly"]);
    }

    public function updatePossibilities(UpdatePossibilitiesRequest $request)
    {
        $data = $request->except("_token", "aid");
        Apartment::where("id", $request->get("aid"))->update($data);
        return response(["message" => "update successfuly"]);
    }

    public function updateAddress(UpdateApartmentAddressRequest $request)
    {
        $data = $request->except("_token", "aid");
        Apartment::where("id", $request->get("aid"))->update($data);
        return response(["message" => "update successfuly"]);
    }

    public function updateRentPricing(UpdateRentPricingRequest $request)
    {

        $data = $request->except("_token", "aid");
        Apartment::where("id", $request->get("aid"))->update($data);
        return response(["message" => "update successfuly"]);
    }

    public function updateSoldPricing(UpdateSoldPricingRequest $request)
    {

        $data = $request->except("_token", "aid");
        Apartment::where("id", $request->get("aid"))->update($data);
        return response(["message" => "update successfuly"]);
    }

    public function setApartmentStatus($status, $id)
    {
        Apartment::where("id", $id)->update(["status" => $status]);
        return response(["message" => "status updated"], 200);
    }

    public function manageApartments()
    {
        $apartments = Apartment::where("user_id", Auth::id());
        return view("pages.apartment.manage-apartment", ["apartments" => $apartments->get()]);
    }

    public function deleteApartment($id = null)
    {
        $user = Auth::user();
        $apartment = $user->apartments()->where("id", $id);
        if ($apartment->count()) {
            if ($apartment->get()[0]->cover) {
                unlink(public_path("covers") . "/" . $apartment->get()[0]->cover);
            }
            $pictures = Apartment::find($id)->pictures()->get();
            $apartment->delete();
            foreach ($pictures as $picture) {
                $picture->delete();
                unlink(public_path("apartment_pictures") . "/" . $picture->url);
            }
            return response(["message" => "apartment deleted"], 200);
        } else {
            return response(["message" => "apartment not found"], 400);
        }
    }

    public function getSingleApartment($id = null)
    {
        if ($id == null) {
            return redirect("/");
        }
        $data = Apartment::where([
            ["id", $id],
            ["status", "published"]
        ]);



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



        if ($data->get()->count() == 0) {
            return redirect("/");
        } else {
            $data = $data->get()[0];
        }


        $saved = 0;
        if (Auth::check() && $data->saves()->where("user_id", Auth::id())->get()->count()) {
            $saved = 1;
        }
        


        return view("pages.apartment.apartment", [
            "data" =>  $data,
            "state" => $state,
            "city" => $city , 
            "saved" => $saved
        ]);
    }
}
