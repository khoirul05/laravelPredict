<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data_hasil = \App\Models\Hasil::all();
        return view('dashboards.index',['data_hasil' => $data_hasil]);
    }
}
