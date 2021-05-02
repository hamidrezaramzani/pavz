<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function all()
    {
        $payments = Payment::where("user_id" , Auth::id());
        return view("pages.payment.all" , ["payments" => $payments->get()]);
    }
}
