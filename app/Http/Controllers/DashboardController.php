<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dataset = \App\Models\Dataset::all();
        return view('dashboards.index',['dataset' => $dataset]);
    }
}
