<?php

namespace App\Http\Controllers;

use App\Models\Vip;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VipController extends Controller
{
    public function newVip()
    {
        // dd(Carbon::now()->addDay(21)->month);
        $data  = Vip::all();
        return view("pages.vip.new-vip" , ["data" => $data]);
    }    
}
