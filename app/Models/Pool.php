<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    use HasFactory;
    protected $fillable = [
        "pool_type",
        "pool_location",
        "heating_systems",
        "cooling_systems",
        "width",
        "length",
        "min_depth",
        "max_depth",
        "possibilities",
        "villa_id",
        "id",
    ];
    public function possibilities()
    {
        return $this->morphToMany(Possibilities::class, "possibilitiesable");
    }
}
