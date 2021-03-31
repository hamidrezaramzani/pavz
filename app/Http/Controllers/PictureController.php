<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Area;
use App\Models\Picture;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    public function updateVillaCover(Request $request)
    {

        if ($request->file("cover")) {
            $id = $request->get("id");
            $fileName = time() . '.' . $request->file("cover")->extension();
            $villa = Villa::find($id);
            if ($villa->cover) {
                unlink(public_path("covers/$villa->cover"));
            }
            $request->file("cover")->move(public_path("covers"), $fileName);
            $villa = Villa::where("id", $id);
            $villa->update([
                "cover" => $fileName
            ]);
            $level = $villa->get()[0]->level;
            $VillaController = new VillasController();
            $VillaController->updateLevel($level, $request->get("level"), $villa);


            return response(["messgae" => "cover updated"], 200);
        }
    }



    public function updateVillaPictures(Request $request)
    {

        $id = $request->get("id");
        $deletedPictures = json_decode($request->get("deleted_pictures"));

        foreach ($deletedPictures as $pic_id) {
            $pic = Picture::where("id", $pic_id);
            unlink(public_path("villa_pictures") . "/" . $pic->get()[0]->url);
            $pic->delete();
        }
        $files = $request->allFiles();
        if (count($files) > 0) {
            foreach ($files as $file) {
                $fileName = time() . rand(1, 9999) . '.' . $file->extension();
                $file->move(public_path("villa_pictures"), $fileName);
                $villa = Villa::find($id);
                $picture = new Picture([
                    "url" => $fileName
                ]);
                $picture->pictureable()->associate($villa);
                $picture->save();
            }
        }
    }

    public function getVillaPictures($id = null)
    {
        $data = Villa::find($id)->pictures();
        $isCover = Villa::find($id)->get()[0]->cover;
        return response([
            "cover" => $isCover,
            "pictures" => $data->get()->toArray()
        ], 200);
    }


    public function getApartmentPictures($id = null)
    {
        $data = Apartment::find($id)->pictures();
        $isCover = Apartment::find($id)->get()[0]->cover;
        return response([
            "cover" => $isCover,
            "pictures" => $data->get()->toArray()
        ], 200);
    }


    public function getAreaPictures($id = null)
    {
        $data = Area::find($id)->pictures();
        $isCover = Area::find($id)->get()[0]->cover;
        return response([
            "cover" => $isCover,
            "pictures" => $data->get()->toArray()
        ], 200);
    }


    public function updateApartmentCover(Request $request)
    {

        if ($request->file("cover")) {
            $id = $request->get("id");
            $fileName = time() . '.' . $request->file("cover")->extension();
            $apartment = Apartment::find($id);
            if ($apartment->cover) {
                unlink(public_path("covers/$apartment->cover"));
            }
            $request->file("cover")->move(public_path("covers"), $fileName);
            $apartment = Apartment::where("id", $id);
            $apartment->update([
                "cover" => $fileName ,
                "level" => $request->get("level") > $apartment->get()[0]->level ? $request->get("level") : $apartment->get()[0]->level 
            ]);
            return response(["messgae" => "cover updated"], 200);
        }
    }


    public function updateAreaCover(Request $request)
    {

        if ($request->file("cover")) {
            $id = $request->get("id");
            $fileName = time() . '.' . $request->file("cover")->extension();
            $area = Area::find($id);
            if ($area->cover) {
                unlink(public_path("covers/$area->cover"));
            }            
            $request->file("cover")->move(public_path("covers"), $fileName);
            $area = Area::where("id", $id);
            $area->update([
                "cover" => $fileName ,   
                "level" => $request->get("level") > $area->get()[0]->level ? $request->get("level") : $area->get()[0]->level 
            ]);
            return response(["messgae" => "cover updated"], 200);
        }
    }


    public function updateApartmentPictures(Request $request)
    {
        $id = $request->get("id");
        $deletedPictures = json_decode($request->get("deleted_pictures"));

        foreach ($deletedPictures as $pic_id) {
            $pic = Picture::where("id", $pic_id);
            unlink(public_path("apartment_pictures") . "/" . $pic->get()[0]->url);
            $pic->delete();
        }
        $files = $request->allFiles();
        if (count($files) > 0) {
            foreach ($files as $file) {
                $fileName = time() . rand(1, 9999) . '.' . $file->extension();
                $file->move(public_path("apartment_pictures"), $fileName);
                $apartment = Apartment::find($id);
                $picture = new Picture([
                    "url" => $fileName
                ]);
                $picture->pictureable()->associate($apartment);
                $picture->save();
            }
        }
    }


    public function updateAreaPictures(Request $request)
    {
        $id = $request->get("id");
        $deletedPictures = json_decode($request->get("deleted_pictures"));

        foreach ($deletedPictures as $pic_id) {
            $pic = Picture::where("id", $pic_id);
            unlink(public_path("area_pictures") . "/" . $pic->get()[0]->url);
            $pic->delete();
        }
        $files = $request->allFiles();
        if (count($files) > 0) {
            foreach ($files as $file) {
                $fileName = time() . rand(1, 9999) . '.' . $file->extension();
                $file->move(public_path("area_pictures"), $fileName);
                $area = Area::find($id);
                $picture = new Picture([
                    "url" => $fileName
                ]);
                $picture->pictureable()->associate($area);
                $picture->save();
            }
        }
    }
}
