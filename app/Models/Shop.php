<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = ["user_id" , "ads_type"];
    public function pictures()
    {
        return $this->morphMany(Picture::class , "pictureable");                
    }

}
