<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldVillaPrice extends Model
{
    use HasFactory;

    protected $fillable = ["villa_id", "total_price", "price_per_meter"];
}
