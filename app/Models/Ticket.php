<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ["title", "description", "priority", "attach", "user_id"];
    public function answers()
    {
        return $this->hasMany(TicketAnswer::class);
    }
}
