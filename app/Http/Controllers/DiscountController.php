<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Vip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $item->price = $item->prevPrice - ($percent * $item->price / 100);
        }
        return response(["data" => $vips], 200);
    }


    public function getPriceDuration($vip)
    {
        $duration = $vip->duration;
        $month = "";
        switch ($duration) {
            case '30':
                $month = "1";
                break;
            case "60":
                $month = "3";
                break;
            case "90":
                $month = "6";
                break;
        }
        return $month;
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
            $price = $price - ($percent * $price / 100);
        }

        $params = array(
            'order_id' => $data["id"],
            'amount' => $price,
            'desc' => 'خرید اشتراک ویژه ' . $this->getPriceDuration(Vip::find($data["id"])) . " ماهه ",
            'callback' => 'https://pavz.ir/callback',
            "name" => Auth::user()->profile->fullname
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-API-KEY: ' . env("API_IDPAY"),            
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        return response($result);
    }
}
