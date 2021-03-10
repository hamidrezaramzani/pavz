<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $casts = [
        "possibilities" => "array"
    ];
    protected $fillable = [
        "id",
        "room_title",
        "single_bed",
        "double_bed",
        "possibilities",
        "is_master" , 
        "villa_id"
    ];

    public function villas()
    {
        return $this->belongsTo(Villa::class);
    }
}
