<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $viewData = [
            'title' => "Dashboard",
            'activePage' => "dashboard"
        ];

        return view('admin.dashboard', $viewData);
    }
}
