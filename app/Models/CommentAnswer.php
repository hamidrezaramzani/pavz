<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentAnswer extends Model
{
    use HasFactory;
    protected $fillable = ["description", "comment_id", "user_id"];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
