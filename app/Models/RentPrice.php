<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentPrice extends Model
{
    use HasFactory;
    protected $table = "rent_prices";
    protected $fillable = ["middweek", "endweek", "peek", "price_per_person", "middweek_discount", "endweek_discount", "peek_discount", "villa_id"];
}
