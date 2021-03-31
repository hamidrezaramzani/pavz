<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaScore extends Model
{
    use HasFactory;
    protected $fillable = ["name", "score", "villa_id", "user_id"];
}
