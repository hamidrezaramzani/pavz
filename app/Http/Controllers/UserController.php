<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActiveUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\SubmitProfilePictureRequest;
use App\Models\Like;
use App\Models\Profile;
use App\Models\Reserve;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Error;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Morilog\Jalali\Jalalian;
use Kavenegar;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class UserController extends Controller
{


    public function resetPassword(Request $request)
    {
        $phonenumber = $request->get("phonenumber");
        $code = $request->get("code");
        $password = $request->get("password");
        $user = User::where([
            ["activeCode", $code],
            ["phonenumber", $phonenumber]
        ]);
        if ($user->count()) {
            $user->update([
                "password" => Hash::make($password),
                "activeCode" => 0
            ]);
            return response(["message" => "password changed"]);
        } else {
            return response(["message" => "user not found"], 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return redirect("/panel");
        } else {
            return view("register");
        }
    }

    public function loginForm()
    {
        if (Auth::check()) {
            return redirect("/panel");
        } else {
            return view("login");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $activeCode = rand(1000, 9999);
        $activeCodeExpire = now()->addMinute(2);
        $phonenumber = $request->get("phonenumber");
        $user = User::where([["phonenumber", $phonenumber], ["isReady", 0]])->count();

        // try {
        //     $sender = "2000500666";
        //     $message = "کد تاییدی ثبت نام پاوز : " . $activeCode;
        //     $receptor = array($phonenumber);
        //     $result = Kavenegar::Send($sender, $receptor, $message);
        //     $this->format($result);
        // } catch (ApiException $e) {
        //     return response(["message" => $e->errorMessage()], 400);
        // } catch (HttpException $e) {
        //     return response(["message" => $e->errorMessage()], 400);
        // }

        if ($user) {
            User::where("phonenumber", $phonenumber)->update([
                "activeCode" => $activeCode,
                "activeCodeExpire" => $activeCodeExpire
            ]);
        } else {
            $newUser = User::create([
                "phonenumber" => $phonenumber,
                "password" => Hash::make($request->get("password")),
                "activeCode" => $activeCode,
                "activeCodeExpire" => $activeCodeExpire
            ]);

            Profile::create([
                "fullname" => "",
                "bio" => "",
                "telegram_id" => "",
                "instagram_id" => "",
                "image" => "",
                "user_id" => $newUser->id
            ]);
        }
    }



    public function isPhoneNumberDuplicate($phonenumber = null)
    {
        $user = User::where([["phonenumber", $phonenumber], ["isReady", 1]])->get()->count();
        return $user;
    }

    public function activeUser(ActiveUserRequest $request)
    {
        $phonenumber = $request->get("phonenumber");
        $code = $request->get("code");
        $user = User::where([
            ["phonenumber", $phonenumber],
            ["isReady", "0"]
        ]);

        if (!$user) {
            return response(["message" => "user not found"], 401);
        }
        $userActivationCode = $user->pluck("activeCode")[0];
        if ($code == $userActivationCode) {
            User::where("phonenumber", $phonenumber)->update([
                "isReady" => true,
                "activeCode" => 0,
            ]);
            return response(["message" => "user created"], 200);
        } else {
            return response(["message" => "active code is mistake"], 401);
        }
    }


    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only(['phonenumber', 'password']);
        $credentials["isReady"] = 1;
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response("Login Success", 200);
        } else {
            return response("Logout failed", 401);
        }
    }


    public function panel()
    {
        $reserves = Reserve::where("user_id", Auth::id())->limit(6);
        $tickets = Ticket::where("user_id", Auth::id())->limit(6);


        return view("dashboard", ["reserves" => $reserves->get(), "tickets" => $tickets->get()]);
    }

    public function profile()
    {
        $id = Auth::id();
        $user = User::find($id);
        $profile = $user->profile;
        return view("profile", [
            "ready" => $user->isReady,
            "phonenumber" => $user->phonenumber,
            "image" => $profile->image ?? null,
            "fullname" => $profile->fullname ?? null,
            "address" => $profile->address ?? null,
            "telegram_id" => $profile->telegram_id ?? null,
            "user" => $profile

        ]);
    }

    public function submitProfilePicture(SubmitProfilePictureRequest $request)
    {

        $fileName = time() . '.' . $request->file("image")->extension();
        $request->file("image")->move(public_path("/upload"), $fileName);
        $id = Auth::id();
        $user = User::find($id);
        $image = $user->profile->image;
        if ($image) {
            unlink(public_path("upload/" . $image));
        }
        $user->profile()->update(["image" => $fileName]);
        return redirect("/profile")->with("profile", "update");
    }

    public function changeUserProfile(Request $request)
    {
        $data = $request->except("_token");
        Auth::user()->profile->update($data);
        return response(["message" => "profile updated"]);
    }

    public function submitUserInfo(Request $request)
    {
        $user = User::find(Auth::id());
        $user->profile()->update([
            "fullname" => $request->get("fullname"),
            "address" => $request->get("address"),
            "telegram_id" => $request->get("telegram_id"),
        ]);
        return back()->with("user-info", "update");
    }

    public function checkPhonenumberAndSendCode(Request $request)
    {
        $phonenumber = $request->get("phonenumber");
        $user = User::where("phonenumber", $phonenumber);
        if ($user->count()) {
            $activeCode = rand(1000, 9999);
            // یه پیامک میفرستیم به کاربر برای کد بازیابی
            $user->update(["activeCode" => $activeCode]);
            return response(["message" => "sended"]);
        } else {
            return response(["message" => "phonenumber not found"], 401);
        }
    }

    public function getUser($id)
    {
        $user = User::where("id", $id);
        if (!$user->count()) {
            return redirect("/");
        }
        $user = $user->get()[0];

        $villas = $user->villas()->where(["status" => "published"]);
        $apartments = $user->apartments()->where(["status" => "published"]);
        $areas = $user->areas()->where(["status" => "published"]);
        $shops = $user->shops()->where(["status" => "published"]);

        $likes = Like::where("user_id" , $id);
        $states = json_decode(file_get_contents(public_path("json/states.json")));
        $cities = json_decode(file_get_contents(public_path("json/cities.json")));

        return view("pages.user.user", [
            "villas" => $villas->get(),
            "states" => $states,
            "cities" => $cities,
            "apartments" => $apartments->get() ,
            "areas" => $areas->get() ,
            "shops" => $shops->get() ,
            "user" =>$user, 
            "likes" => $likes->get()->count()
        ]);
    }
}
