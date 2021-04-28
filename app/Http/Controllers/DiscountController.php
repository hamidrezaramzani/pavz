<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Vip;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function newDiscount()
    {
        return view("pages.discount.new");
    }

    public function createDiscount(Request $request)
    {
        $data = $request->except("_token");
        Discount::create($data);
        return response(["message" => "discount created"]);
    }

    public function manageDiscounts()
    {
        $discounts = Discount::all();
        return view("pages.discount.manage", ["discounts" => $discounts]);
    }
    public function deleteDiscount($id)
    {
        Discount::where("id", $id)->delete();
        return response(["message" => "deleted"]);
    }

    public function applyCode($code)
    {
        $discount = Discount::where("code", $code)->get();
        if (!$discount->count()) {
            return response(["message" => "code not found"], 400);
        }

        $discount = $discount[0];
        $percent = $discount->percent;

        $vips = Vip::all();
        foreach ($vips as $item) {
            $item->prevPrice = $item->price;
            $item->price = $percent * $item->price / 100;
        }
        return response(["data" => $vips], 200);
    }

    public function getPrice(Request $request)
    {
        $request->validate([
            "code" => "nullable|string",
            "id" => "required|numeric"
        ]);
        $data = $request->except("_token");
        $price = Vip::find($data["id"])->price;
        if ($data["code"]) {
            $percent = Discount::where("code", $data["code"])->get()[0]->percent;
            $price = $percent * $price / 100;
        }

        return response(["price" => $price ]);
    }
}
