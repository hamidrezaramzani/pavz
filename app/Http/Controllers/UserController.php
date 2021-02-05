<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function isPhoneNumberDuplicate($phonenumber = null)
    {
        // $phonenumber = request()->get("phonenumber");
        // dd($phonenumber);
        $user = User::where([
            ["phonenumber", $phonenumber],
            ["isReady", "1"]
        ])->get()->count();
        return $user;
    }
}
