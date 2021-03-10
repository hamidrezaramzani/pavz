<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = [
        "delivery_time", "discharge_time", "min_stay", "more_time_rules_description",
        "animal", "smoke", "party", "more_rules_description", "villa_id"
    ];


    public function villas()
    {
        return $this->belongsTo(Villa::class);
    }
}
