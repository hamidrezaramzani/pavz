<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaType extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    public function villas()
    {
        return $this->hasMany(Villa::class);
    }
}
