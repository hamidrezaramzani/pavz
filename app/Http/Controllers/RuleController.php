<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRulesRequest;
use App\Models\Rule;
use App\Models\Villa;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function updateRules(UpdateRulesRequest $request)
    {

        $data = $request->except("_token", "level");

        $villa = Villa::where("id", $data["villa_id"]);
        $is_exists = $villa->withCount("rules");
        $is_exists = $is_exists->get()[0]->rules_count;
        $level = $villa->get()[0]->level;
        $VillaController = new VillasController();
        $VillaController->updateLevel($level, $request->get("level"), $villa);


        if (!$is_exists) {
            Rule::create($data);
            return response(["message" => "rules created"], 200);
        } else {
            Rule::where("villa_id", $data["villa_id"])->update($data);
            return response(["message" => "rules updated"], 200);
        }
    }
}
