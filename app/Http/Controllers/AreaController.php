<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAreaAddressRequest;
use App\Http\Requests\UpdateAreaDocumentRequest;
use App\Http\Requests\UpdateAreaPricingRequest;
use App\Http\Requests\UpdateAreaSpecificationRequest;
use App\Models\Area;
use App\Models\AreaType;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    public function newArea()
    {
        $userId = Auth::id();

        $area = Area::create([
            "user_id" => $userId
        ]);

        return redirect("/edit-area/$area->id");
    }

    public function getCities($id)
    {
        $data = json_decode(file_get_contents(public_path("json/cities.json")));
        $data = array_filter($data, function ($value) use ($id) {
            return $value->province == $id;
        });
        return $data;
    }


    public function editArea($id = null)
    {
        // if ($id == null || !is_int($id)) {
        //     return redirect("/panel");
        // }


        $area = Area::where([
            ["id", $id],
            ["user_id", Auth::id()]
        ]);

        if (!$area->count()) {
            return redirect("/panel");
        }
        $data = $area->get()[0];
        $states = json_decode(file_get_contents(public_path("json/states.json")));

        $areaTypes = AreaType::all();
        $documentTypes = DocumentType::all();
        $cities = [];
        if ($data->state) {
            $cities = $this->getCities($data->state);
        }

        if (!$area->count())
            return redirect("/panel");


        $formSteps = [
            ["icon" => "fa fa-file", "title" => "اطلاعات کلی"],
            ["icon" => "fa fa-gavel", "title" => "اسناد و امیتازات"],
            ["icon" => "fa fa-address-card", "title" => "آدرس", "id" => "address-step"],
            ["icon" => "fa fa-dollar-sign", "title" => "قیمت گذاری"],
            ["icon" => "fa fa-image", "title" => "تصاویر زمین"],
            ["icon" => "fa fa-flag-checkered", "title" => "مرحله نهایی"],
        ];
        $pages = ["specification", "documents", "address", "pricing", "pictures", "finish"];
        return view("pages.areas.edit-area", ["data" => $data, "states" => $states, "cities" => $cities, "documentTypes" => $documentTypes, "steps" => $formSteps, "pages" => $pages , "areaTypes" => $areaTypes]);
    }

    public function updateSpecification(UpdateAreaSpecificationRequest $request)
    {
        $data = $request->except(["id", "_token"]);
        Area::where("id", $request->get("id"))->update($data);
        return response(["message" => "updated"], 200);
    }

    public function updateDocuments(UpdateAreaDocumentRequest $request)
    {
        $data = $request->except(["id", "_token"]);
        Area::where("id", $request->get("id"))->update($data);
        return response(["message" => "updated"], 200);
    }

    public function updateAddress(UpdateAreaAddressRequest $request)
    {

        $data = $request->except(["id", "_token"]);
        Area::where("id", $request->get("id"))->update($data);
        return response(["message" => "updated"], 200);
    }

    public function updatePricing(UpdateAreaPricingRequest $request)
    {
        $data = $request->except(["id", "_token"]);
        Area::where("id", $request->get("id"))->update($data);
        return response(["message" => "updated"], 200);
    }

    public function setAreaStatus($status, $id)
    {

        Area::where("id", $id)->update(["status" => $status]);
        return response(["message" => "status updated"], 200);
    }

    public function manageAreas()
    {
        $data = Area::where("user_id", Auth::id());
        return view("pages.areas.manage", ["areas" => $data->get()]);
    }

    public function deleteArea($id = null)
    {
        $user = Auth::user();
        $area = $user->areas()->where("id",$id);
        if ($area->count()) {
            if ($area->get()[0]->cover) {
                unlink(public_path("covers") . "/" . $area->get()[0]->cover);
            }
            $pictures = Area::find($id)->pictures()->get();
            $area->delete();
            foreach ($pictures as $picture) {
                $picture->delete();
                unlink(public_path("area_pictures") . "/" . $picture->url);
            }
            return response(["message" => "area deleted"], 200);
        } else {
            return response(["message" => "area not found"], 400);
        }
    }

    public function getSingleArea($id = null)
    {
        return view("pages.areas.area");
    }

}
