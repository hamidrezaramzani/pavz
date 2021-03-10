<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPoolRequest;
use App\Models\Pool;
use App\Models\Villa;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    public function newPool(NewPoolRequest $request)
    {
        $data = $request->except("_token");
        Pool::create($data);
        return response(Pool::where("villa_id", $data["villa_id"])->get(), 200);
    }

    public function removePool($id = null, $villa_id = null)
    {
        Pool::where("id", $id)->delete();
        $data = Villa::find($villa_id);
        return response($data->pools()->get(), 200);
    }
}
