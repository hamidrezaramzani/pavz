<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "ads_type"];
    public function pictures()
    {
        return $this->morphMany(Picture::class, "pictureable");
    }

    public function saves()
    {
        return $this->morphMany(Save::class, "saveable");
    }

    public function likes()
    {
        return $this->morphMany(Like::class, "likeable");
    }

    public function document()
    {
        return $this->hasOne(DocumentType::class, "id", "document_type");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
