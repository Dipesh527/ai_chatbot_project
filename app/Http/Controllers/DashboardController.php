<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Return a view or response for the main user dashboard
        return view('dashboard.index'); // You can create this view later
    }
}
