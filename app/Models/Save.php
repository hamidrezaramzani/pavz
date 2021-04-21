<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    use HasFactory;
    protected $fillable = ["user_id"];
    public $timestamps = false;
    public function saveable()
    {
        return $this->morphTo();
    }

}
