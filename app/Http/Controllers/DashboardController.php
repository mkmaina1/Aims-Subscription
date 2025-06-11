<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Optionally, fetch statistics here (users count, roles count, etc.)
        return view('dashboard');
    }
}
