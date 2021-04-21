<?php

namespace App\Http\Controllers;

use App\Models\Discount;
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
}
