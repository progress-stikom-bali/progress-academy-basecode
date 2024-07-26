<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Room;

class DashboardController extends Controller
{
    public function index(){
        $rooms = Room::all();

        return view('user.dashboard',
        [
            'rooms' => $rooms,
            'title' => 'Dashboard Member'
        ]);
    }
}
