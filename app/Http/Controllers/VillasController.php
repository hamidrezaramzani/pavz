<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressInfoRequest;
use App\Http\Requests\HomeInfoRequest;
use App\Http\Requests\PossiblitiesInfoRequest;
use App\Http\Requests\SpaceInfoRequest;
use App\Http\Requests\SpecificationFormRequest;
use App\Models\Comment;
use App\Models\DocumentType;
use App\Models\Picture;
use App\Models\Reserve;
use App\Models\SpecialPlace;
use App\Models\User;
use App\Models\Villa;
use App\Models\VillaType;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Morilog\Jalali\Jalalian;

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

    public function getSingleVilla($id = null)
    {

        if ($id == null)
            return redirect("/");

        $data =  Villa::with([
            "rooms" => function ($q) {
                return $q->orderBy("created_at", "asc");
            }, "specialPlaces", "pools" => function ($q) {
                return $q->orderBy("created_at", "asc");
            },
            "parkings" => function ($q) {
                return $q->orderBy("created_at", "asc");
            },
            "pictures", "rentPrices", "villaTypes", "documents", "soldVillaPrices",
        ]);

        $data = Villa::where([
            ["id", $id],
            ["status", "published"]
        ]);

        if ($data->count())
            $data = $data->get()[0];
        else
            return redirect("/");


        if (!Session::get("villa-" . $data->id)) {
            Session::push("villa-" . $data->id, true);
            Villa::where("id", $id)->update(["view_count" => $data->view_count  + 1]);
        }


        $comments = Comment::with(["commentAnswers"])->where([
            "villa_id" => $id,
            "status" => 1
        ]);

        $documentTypes  = DocumentType::all();


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


        if (!$data->get()->count()) {
            return redirect("/");
        }


        $saved = 0;
        if (Auth::check() && $data->get()[0]->saves()->where("user_id", Auth::id())->get()->count()) {
            $saved = 1;
        }

        return view("pages.villa.villa", [
            "data" => $data,
            "state" => $state,
            "city" => $city,
            "documentTypes" => $documentTypes,
            "comments" => $comments->get(),
            "saved" => $saved
        ]);
    }

    public function createVilla(Request $request)
    {
        $villa = Villa::create([
            "ads_type" => $request->get("ads_type"),
            "user_id" => Auth::id()
        ]);



        $id = $villa->id;

        return redirect("/edit-villa/$id");
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


        if (!$villa->get()->count()) {
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

        $villaTypes = VillaType::all();
        $states = json_decode(file_get_contents(public_path("json/states.json")));
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



    public function checkLevel($currentLevel, $nextLevel)
    {
        return $currentLevel < $nextLevel ? $nextLevel : $currentLevel;
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
        $level = $villa->get()[0]->level;
        $data["level"] = $this->checkLevel($level, $request->get("level"));
        $villa->update($data);
        return response(["message" => "update successfully"], 200);
    }

    public function updateHomeInfo(HomeInfoRequest $request)
    {
        $data = $request->except("_token");
        $villa = Villa::where("id", $data["id"]);
        $level = $villa->get()[0]->level;

        $data["level"] = $this->checkLevel($level, $request->get("level"));
        $villa->update($data);
        return response(["message" => "updated"], 200);
    }

    public function updateSpaceInfo(SpaceInfoRequest $request)
    {
        $data = $request->except("_token");
        $villa = Villa::where("id", $data["id"]);
        $level = $villa->get()[0]->level;
        $data["level"] = $this->checkLevel($level, $request->get("level"));
        $villa->update($data);
        return response(["message" => "updated"], 200);
    }

    public function updatePossibilitiesInfo(PossiblitiesInfoRequest $request)
    {

        $data = $request->except("_token");
        $villa = Villa::where("id", $data["id"]);
        $level = $villa->get()[0]->level;
        $data["level"] = $this->checkLevel($level, $request->get("level"));
        $villa->update($data);
        return response(["message" => "updated"], 200);
    }

    public function updateAddressInfo(AddressInfoRequest $request)
    {
        $data = $request->except("_token");
        $villa = Villa::where("id", $data["id"]);
        $level = $villa->get()[0]->level;
        $data["level"] = $this->checkLevel($level, $request->get("level"));
        $villa->update($data);

        return response(["message" => "updated"], 200);
    }


    /// MUST BE CHANGED
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

            $cover = $villa->get()[0]->cover;
            $pictures = Villa::find($id)->pictures()->get();
            $saves = Villa::find($id)->saves()->get();
            $likes = Villa::find($id)->likes()->get();
            $villa->delete();
            if ($cover) {
                unlink(public_path("covers") . "\\" . $cover);
            }


            foreach ($pictures as $picture) {
                $picture->delete();
                unlink(public_path("villa_pictures") . "/" . $picture->url);
            }

            foreach ($saves as $save) {
                $save->delete();
            }

            foreach ($likes as $like) {
                $like->delete();
            }

            return response(["message" => "villa deleted"], 200);
        } else {
            return response(["message" => "villa not found"], 400);
        }
    }

    public function getReserves($id)
    {

        $dates = [];
        $reserves = Reserve::where([
            ["villa_id", $id],
            ["status", "confirm"]
        ]);
        foreach ($reserves->get() as $item) {
            $start = Jalalian::fromFormat("Y-m-d", $item->start)->toCarbon()->toDateString();
            $end = Jalalian::fromFormat("Y-m-d", $item->end)->toCarbon()->toDateString();;

            $period = CarbonPeriod::create($start,$end);

            $singleDays = $period->toArray();
            foreach ($singleDays as $item) {
                $date = Jalalian::fromCarbon($item);                            
                array_push($dates , $date->format("Y-m-d"));
            }
        }

        return response(["dates" => $dates]);
    }
}
