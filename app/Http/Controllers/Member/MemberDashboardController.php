<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Import Model
use App\Models\Room;

class MemberDashboardController extends Controller
{
    public function index(){
        $rooms = Room::all();
        $viewData = [
            'title' => 'Dashboard',
            'activePage' => 'dashboard',
            'rooms' => $rooms,
        ];

        return view('user.dashboard', $viewData);
    }

    public function roomDetail(string $id){
        $room = Room::find($id);
        $viewData = [
            'title' => 'Room Detail',
            'activePage' => 'dashboard',
            'room' => $room,
        ];

        return view('user.rooms.detail', $viewData);
    }
}
