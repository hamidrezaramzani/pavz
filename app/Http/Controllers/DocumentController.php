<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Document;
use App\Models\Villa;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function updateDocument(UpdateDocumentRequest $request)
    {

        $data = $request->except("_token" , "level");
        $villa = Villa::where("id", $data["villa_id"]);
        $is_exists = $villa->withCount("documents");
        $is_exists = $is_exists->get()[0]->documents_count;


        
        $level = $villa->get()[0]->level;
        $VillaController = new VillasController();
        $VillaController->updateLevel($level, $request->get("level"), $villa);


        if (!$is_exists) {
            Document::create($data);
            return response(["message" => "documents created"], 200);
        } else {
            Document::where("villa_id", $data["villa_id"])->update($data);
            return response(["message" => "documents updated"], 200);
        }

    }
}
