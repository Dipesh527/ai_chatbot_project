<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Return a view or response for the admin dashboard
        return view('admin.index'); // You can create this view later
    }

    public function settings()
    {
        // Example settings page for admin
        return view('admin.settings'); // You can create this view later
    }
}
