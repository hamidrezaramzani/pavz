<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAnswer extends Model
{
    use HasFactory;
    protected $fillable = ["description" , "ticket_id" , "user_id" , "type"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
