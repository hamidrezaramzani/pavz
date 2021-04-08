<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;    
    protected $fillable = ["start" , "end" , "fullname" , "guests" , "phonenumber" , "villa_id"];
}
