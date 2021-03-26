<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentAccountTypes extends Model
{
    use HasFactory;
    protected $table = "apartment_account_types";
    protected $fillable = ["name"];
    public $timestamps = false;
}
