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

        $data = $request->except("_token");

        $is_exists = Villa::where("id", $data["villa_id"])->withCount("rules");
        $is_exists = $is_exists->get()[0]->rules_count;
        if (!$is_exists) {
            Rule::create($data);
            return response(["message" => "rules created"], 200);
        } else {
            Rule::where("villa_id", $data["villa_id"])->update($data);
            return response(["message" => "rules updated"], 200);
        }
    }
}
