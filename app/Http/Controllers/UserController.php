<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActiveUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\SubmitProfilePictureRequest;
use App\Models\Profile;
use App\Models\User;
use DateTime;
use Error;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // after : بررسی کن که آیا کد معرفی وجود داره یا نه اگه وجود داشت به اون کاربر یکی اضافه کن
        $activeCode = rand(1000, 9999);
        $activeCodeExpire = now()->addMinute(2);
        $phonenumber = $request->get("phonenumber");
        $user = User::where([["phonenumber", $phonenumber], ["isReady", 0]])->count();
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

            $profile = new Profile([
                "fullname" => "",
                "email" => "",
                "address" => "",
                "telegram_id" => "",
                "image" => "",
            ]);
            $newUser->profile()->save($profile);
        }
        // send sms with kavehnegar
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
        return view("dashboard");
    }

    public function profile()
    {
        $id = Auth::id();
        $user = User::find($id);
        $profile = $user->profile[0];
        return view("profile", [
            "ready" => $user->isReady,
            "phonenumber" => $user->phonenumber,
            "image" => $profile->image,
            "fullname" => $profile->fullname,
            "address" => $profile->address,
            "telegram_id" => $profile->telegram_id,

        ]);
    }

    public function submitProfilePicture(SubmitProfilePictureRequest $request)
    {

        $fileName = time() . '.' . $request->file("image")->extension();
        $request->file("image")->move(public_path("upload"), $fileName);
        $id = Auth::id();
        $user = User::find($id);
        $image = $user->profile[0]->image;
        if ($image) {
            unlink(public_path("upload/" . $image));
        }
        $user->profile()->update(["image" => $fileName]);
        return redirect("/profile")->with("profile", "update");
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
}
