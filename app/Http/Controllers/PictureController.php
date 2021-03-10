<?php

namespace App\Http\Controllers;

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
            Villa::where("id", $id)->update([
                "cover" => $fileName
            ]);
            return response(["messgae" => "cover updated"], 200);
        }
    }

    public function updateVillaPictures(Request $request)
    {

        $id = $request->get("id");
        $deletedPictures = json_decode($request->get("deleted_pictures"));

        foreach ($deletedPictures as $pic_id) {
            Picture::where("id" , $pic_id)->delete();
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
}
