<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Like;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likeVilla($id)
    {
        $like = Villa::find($id)->likes()->where(["user_id" => Auth::id()]);
        if ($like->count()) {
            $like->delete();
            return response(["message" => "deleted" , "type" => "delete"]);
        } else {
            $villa = Villa::find($id);
            $like = new Like(["user_id" => Auth::id()]);
            $like->likeable()->associate($villa)->save();
            return response(["message" => "deleted" , "type" => "like"]);

        }
    }


    public function likeApartment($id)
    {
        $like = Apartment::find($id)->likes()->where(["user_id" => Auth::id()]);
        if ($like->count()) {
            $like->delete();
            return response(["message" => "deleted" , "type" => "delete"]);
        } else {
            $apartment = Apartment::find($id);
            $like = new Like(["user_id" => Auth::id()]);
            $like->likeable()->associate($apartment)->save();
            return response(["message" => "deleted" , "type" => "like"]);

        }
    }
}
