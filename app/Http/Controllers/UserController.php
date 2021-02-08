<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
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
        $user = User::find(["phonenumber" => $phonenumber, "isReady" => 0]);
        if ($user) {
            User::where("phonenumber", $phonenumber)->update([
                "activeCode" => $activeCode,
                "activeCodeExpire" => $activeCodeExpire
            ]);
        } else {
            User::create([
                "phonenumber" => $phonenumber,
                "password" => Hash::make($request->get("password")),
                "activeCode" => $activeCode,
                "activeCodeExpire" => $activeCodeExpire
            ]);
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
        //
    }



    public function isPhoneNumberDuplicate($phonenumber = null)
    {
        // $phonenumber = request()->get("phonenumber");
        // dd($phonenumber);
        $user = User::where([["phonenumber", $phonenumber], ["isReady", 1]])->get()->count();
        return $user;
    }
}
