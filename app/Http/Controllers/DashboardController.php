<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
    // dd(Auth::user());
        $viewData = [
            'title' => 'Dashboard',
            'activePage' => 'dashboard',
        ];

        return view('admin.dashboard', $viewData);
    }
}
