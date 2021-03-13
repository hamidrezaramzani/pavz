<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    use HasFactory;
    protected $casts = [
        "heating_system" => "array" , 
        "cooling_system" => "array" , 
        "more_health_possibilities" , 
        "courtyard" ,
        "welfare_amenities" , 
        "kitchen_facilities" 
    ];

    protected $fillable = ["ads_type" , "user_id"];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }


    public function pools()
    {
        return $this->hasMany(Pool::class);
    }



    public function parkings()
    {
        return $this->hasMany(Parking::class);
    }


    public function pictures(){
        return $this->morphMany(Picture::class , "pictureable");
    }


    public function specialPlaces()
    {
        return $this->hasMany(SpecialPlace::class);
    }


    
    public function rules()
    {
        return $this->hasOne(Rule::class);
    }

    
    public function rentPrices()
    {
        return $this->hasOne(RentPrice::class);
    }


        
    public function documents()
    {
        return $this->hasOne(Document::class);
    }


    public function villaTypes()
    {
        return $this->belongsTo(VillaType::class);
    }

    public function soldVillaPrices()
    {
        return $this->hasOne(SoldVillaPrice::class);
    }
}
