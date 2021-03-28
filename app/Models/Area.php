<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = ["user_id"];

    public function pictures()
    {
        return $this->morphMany(Picture::class , "pictureable");              
    }
}
