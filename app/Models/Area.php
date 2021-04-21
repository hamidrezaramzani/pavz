<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = ["user_id"];

    public function pictures()
    {
        return $this->morphMany(Picture::class , "pictureable");              
    }

    public function document()
    {
        return $this->hasOne(DocumentType::class , "id" , "document_type");
    }


    
    public function areaType()
    {
        return $this->hasOne(AreaType::class , "id" , "area_type");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function saves()
    {
        return $this->morphMany(Save::class, "saveable");
    }

    
    public function likes()
    {
        return $this->morphMany(Like::class, "likeable");
    }

}
