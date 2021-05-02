<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use App\Models\Vip;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VipController extends Controller
{
    public function newVip()
    {
        $data  = Vip::all();
        return view("pages.vip.new-vip", ["data" => $data]);
    }

    public function buyVip(Request $request)
    {
        $data = $request->all();
        $status = $data["status"];
        $isPaymentExists = Payment::where([
            ["id", $data["id"]],
            ["track_id", $data["track_id"]]
        ]);
        $vip = Vip::find($data["order_id"]);
        if (!$isPaymentExists->count()) {
            switch ($status) {
                case 10:
                    $params = array(
                        'id' => $data["id"],
                        'order_id' => $data["order_id"],
                    );

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_HTTPHEADER,  array(
                        'Content-Type: application/json',
                        'X-API-KEY: ' . env("API_IDPAY"),
                    ));

                    $result = json_decode(curl_exec($ch));
                    if (isset($result->status) && $result->status == 100) {
                        User::where("id", Auth::id())->update(["expire_vip" => Carbon::now()->addDays($vip->duration)->format("Y/m/d H:i")]);
                        Payment::create([
                            "id" => $data["id"],
                            "track_id" => $data["track_id"],
                            "order_id" => $data["order_id"],
                            "status" => $status,
                            "amount" => $vip->price,
                            "user_id" => Auth::id()
                        ]);
                        return view("pages.payment.success", ["id" => $data["order_id"]]);
                    } else {
                        return view("pages.payment.error", ["status" => 400]);
                    }
                    break;

                default:
                    Payment::create([
                        "id" => $data["id"],
                        "track_id" => $data["track_id"],
                        "order_id" => $data["order_id"],
                        "status" => $status,
                        "amount" => $vip->price,
                        "user_id" => Auth::id()
                    ]);
                    return view("pages.payment.error", ["status" => $status]);
                    break;
            }
        } else {
            return view("pages.payment.error", ["status" => 401]);
        }
    }
}
