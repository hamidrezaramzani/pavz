<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = ["user_id" , "ads_type"];

    public function pictures()
    {
        return $this->morphMany(Picture::class , "pictureable");      
          
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accountType()
    {
        return $this->hasOne(ApartmentAccountTypes::class , "id" , "atype");
    }

    
    public function apartmentType()
    {
        return $this->hasOne(ApartmentTypes::class , "id" , "htype");
    }

    public function document()
    {
        return $this->hasOne(DocumentType::class , "id" , "document_type");
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
