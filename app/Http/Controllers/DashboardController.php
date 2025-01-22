<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'data' => [
                'user' => auth()->user(),
                // Add more data here as needed
            ],
        ]);
    }
}
