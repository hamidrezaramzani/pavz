<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ["id" , "amount" , "order_id" , "status" , "track_id" , "user_id"];

    public function vip()
    {
        return $this->belongsTo(Vip::class , "order_id");
    }
}
