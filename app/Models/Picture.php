<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = ["url","pictureable_id" , "pictureable_type"];

    public function pictureable()
    {
        return $this->morphTo();
    }
}
