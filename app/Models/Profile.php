<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function user()
    {
        $this->belongsTo(User::class);
    }

    protected $fillable  = [
        "fullname",
        "email",
        "address",
        "telegram_id",
        "image"
    ];
}
