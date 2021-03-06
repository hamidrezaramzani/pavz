<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Area;
use App\Models\Picture;
use App\Models\Shop;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    
    public function updateVillaCover(Request $request)
    {
        ini_set("upload_max_filesize" , "40M");
        ini_set("post_max_size " , "40M");

        $id = $request->get("id");
        $villa = Villa::where("id", $id);
        $villa = $villa->get()[0];

        $level = $villa->level;
        $mainLevel =  $level < $request->get("level") ? $request->get("level") : $level;

        Villa::where("id", $id)->update(["level" => $mainLevel]);

        if ($request->file("cover")) {
            $fileName = time() . '.' . $request->file("cover")->extension();
            if ($villa->cover) {
                unlink(public_path("user/covers/$villa->cover"));
            }
            $request->file("cover")->move(public_path("user/covers"), $fileName);
            Villa::where("id", $id)->update([
                "cover" => $fileName
            ]);
            return response(["messgae" => "cover updated"], 200);
        }
    }

    public function updateShopCover(Request $request)
    {

        ini_set("upload_max_filesize" , "40M");
        ini_set("post_max_size " , "40M");

        $id = $request->get("id");
        $shop = Shop::find($id);
        if ($shop->level < $request->get("level")) {
            Shop::where("id", $id)->update(["level" => $request->get("level")]);
        }
        if ($request->file("cover")) {
            $fileName = time() . '.' . $request->file("cover")->extension();
            if ($shop->cover) {
                unlink(public_path("user/covers/$shop->cover"));
            }
            $request->file("cover")->move(public_path("user/covers"), $fileName);
            Shop::where("id", $id)->update(["cover" => $fileName]);
            return response(["messgae" => "cover updated"], 200);
        }
    }



    public function updateShopPictures(Request $request)
    {

        ini_set("upload_max_filesize" , "40M");
        ini_set("post_max_size " , "40M");

        $id = $request->get("id");
        $deletedPictures = json_decode($request->get("deleted_pictures"));

        foreach ($deletedPictures as $pic_id) {
            $pic = Picture::where("id", $pic_id);
            unlink(public_path("user/shop_pictures") . "/" . $pic->get()[0]->url);
            $pic->delete();
        }
        $files = $request->allFiles();
        if (count($files) > 0) {
            foreach ($files as $file) {
                $fileName = time() . rand(1, 9999) . '.' . $file->extension();
                $file->move(public_path("user/shop_pictures"), $fileName);
                $shop = Shop::find($id);
                $picture = new Picture([
                    "url" => $fileName
                ]);
                $picture->pictureable()->associate($shop);
                $picture->save();
            }
        }
    }


    public function updateVillaPictures(Request $request)
    {
        $id = $request->get("id");
        $deletedPictures = json_decode($request->get("deleted_pictures"));

        foreach ($deletedPictures as $pic_id) {
            $pic = Picture::where("id", $pic_id);
            unlink(public_path("user/villa_pictures") . "/" . $pic->get()[0]->url);
            $pic->delete();
        }
        $files = $request->allFiles();
        if (count($files) > 0) {
            foreach ($files as $file) {
                $fileName = time() . rand(1, 9999) . '.' . $file->extension();
                $file->move(public_path("user/villa_pictures"), $fileName);
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
        $isCover = Villa::find($id)->cover;
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
        $isCover = Area::find($id)->cover;
        return response([
            "cover" => $isCover,
            "pictures" => $data->get()->toArray()
        ], 200);
    }


    public function updateApartmentCover(Request $request)
    {
        ini_set("upload_max_filesize" , "40M");
        ini_set("post_max_size " , "40M");


        if ($request->file("cover")) {
            $id = $request->get("id");
            $fileName = time() . '.' . $request->file("cover")->extension();
            $apartment = Apartment::find($id);
            if ($apartment->cover) {
                unlink(public_path("user/covers/$apartment->cover"));
            }
            $request->file("cover")->move(public_path("user/covers"), $fileName);
            $apartment = Apartment::where("id", $id);
            Apartment::where("id", $id)->update([
                "cover" => $fileName,
                "level" => $request->get("level") > $apartment->get()[0]->level ? $request->get("level") : $apartment->get()[0]->level
            ]);
            return response(["messgae" => "cover updated"], 200);
        }
    }


    public function updateAreaCover(Request $request)
    {
        ini_set("upload_max_filesize" , "40M");
        ini_set("post_max_size " , "40M");


        if ($request->file("cover")) {
            $id = $request->get("id");
            $fileName = time() . '.' . $request->file("cover")->extension();
            $area = Area::find($id);
            if ($area->cover) {
                unlink(public_path("user/covers/$area->cover"));
            }
            $request->file("cover")->move(public_path("user/covers"), $fileName);
            Area::where("id", $id)->update([
                "cover" => $fileName,
                "level" => $request->get("level") > $area->get()[0]->level ? $request->get("level") : $area->get()[0]->level
            ]);
            return response(["messgae" => "cover updated"], 200);
        }
    }


    public function updateApartmentPictures(Request $request)
    {
        ini_set("upload_max_filesize" , "40M");
        ini_set("post_max_size " , "40M");

        $id = $request->get("id");
        $deletedPictures = json_decode($request->get("deleted_pictures"));

        foreach ($deletedPictures as $pic_id) {
            $pic = Picture::where("id", $pic_id);
            unlink(public_path("user/apartment_pictures") . "/" . $pic->get()[0]->url);
            $pic->delete();
        }
        $files = $request->allFiles();
        if (count($files) > 0) {
            foreach ($files as $file) {
                $fileName = time() . rand(1, 9999) . '.' . $file->extension();
                $file->move(public_path("user/apartment_pictures"), $fileName);
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
        ini_set("upload_max_filesize" , "40M");
        ini_set("post_max_size " , "40M");

        $id = $request->get("id");
        $deletedPictures = json_decode($request->get("deleted_pictures"));

        foreach ($deletedPictures as $pic_id) {
            $pic = Picture::where("id", $pic_id);
            unlink(public_path("user/area_pictures") . "/" . $pic->get()[0]->url);
            $pic->delete();
        }
        $files = $request->allFiles();
        if (count($files) > 0) {
            foreach ($files as $file) {
                $fileName = time() . rand(1, 9999) . '.' . $file->extension();
                $file->move(public_path("user/area_pictures"), $fileName);
                $area = Area::find($id);
                $picture = new Picture([
                    "url" => $fileName
                ]);
                $picture->pictureable()->associate($area);
                $picture->save();
            }
        }
    }

    public function getShopPictures($id)
    {

        $data = Shop::find($id)->pictures();
        $isCover = Shop::find($id)->cover;
        return response([
            "cover" => $isCover,
            "pictures" => $data->get()->toArray()
        ], 200);
    }
}
