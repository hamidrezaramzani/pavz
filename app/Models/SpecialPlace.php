<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialPlace extends Model
{
    use HasFactory;
    protected $table = "special_places";
    protected $fillable = ["id", "title", "distance_by_walking", "distance_by_car", "villa_id"];

    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }
}
