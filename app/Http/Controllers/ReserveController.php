<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewReserveRequest;
use App\Models\Notification;
use App\Models\Reserve;
use App\Models\User;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kavenegar;

class ReserveController extends Controller
{

    public function sendSms($phonenumber, $message)
    {
        try {
            $sender = "10008663";
            $receptor = array($phonenumber);
            $result = Kavenegar::Send($sender, $receptor, $message);
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            echo $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            echo $e->errorMessage();
        }
    }

    public function newReserve(NewReserveRequest $request)
    {
        $data = $request->except("_token");

        Notification::create([
            "text" => "درخواست رزرو جدیدی برای شما ارسال شده است",
            "icon" => "success",
            "user_id" => $request->get("user_id"),
            "link" => "/reserves/manage"
        ]);
        $user = User::find($request->get("user_id"));
        Reserve::create($data);
        // فرستادن یک پیام به میزبان که بفهمه یه درخواست رزرو براش اومده
        $this->sendSms($user->phonenumber, "پاوز - درخواست رزرو جدیدی برای ارسال شده است.");
        return response(["message" => "reserve sended"]);
    }

    public function getReserves()
    {
        $user_id = Auth::id();
        $data = Villa::where([
            "user_id" => $user_id
        ]);

        return view("pages.villa.reserves", ["data" => $data->get()]);
    }

    public function setReserveStatus($status, $id)
    {
        if ($status != "confirm" && $status != "reject") {
            return redirect("/reserves/manage");
        }

        Reserve::where("id", $id)->update(["status" => $status]);
        $reserve = Reserve::where("id", $id)->get()[0];
        // پیام میفرستیم که لغو کرد یا قبول کرد
        if ($status == "confirm") {
            $this->sendSms($reserve->phonenumber, "وبسایت پاوز - درخواست رزرو شما توسط میزبان مورد قبولی قرار گرفت جهت هماهنگی های بیشتر باید با میزبان تماس بگیرید - شناسه ویلا :" . $reserve->villa_id);
        } else {
            $this->sendSms($reserve->phonenumber, "وبسایت پاوز - درخواست رزرو شما توسط میزبان رد شد - شناسه ویلا : " . $reserve->villa_id);
        }

        return redirect("/reserves/manage");
    }
}
