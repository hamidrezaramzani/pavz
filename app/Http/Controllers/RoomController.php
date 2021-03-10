<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewRoomRequest;
use App\Models\Room;
use App\Models\Villa;

class RoomController extends Controller
{
    public function newRoom(NewRoomRequest $request)
    {
        $data = $request->except("_token");
        Room::create($data);
        $rooms = Villa::find($data['villa_id'])->rooms();
        return response($rooms->get(), 200);
    }


    public function villaRooms($id = null)
    {
        $data = Villa::find($id)->get()[0]->rooms()->orderBy("created_at" , "asc")->get();
        return response($data, 200);
    }

    public function removeRoom($id = null, $villa_id = null)
    {
        Room::where("id", $id)->delete();
        $data = Villa::find($villa_id)->rooms()->get();
        return response($data, 200);
    }
}
