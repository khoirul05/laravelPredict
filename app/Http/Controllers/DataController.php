<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $data_hasil = \App\Models\Hasil::all(); 
        $prediksi = \App\Models\Prediksi::all(); 
        
        // Data Chart
        $categories = [];
        $aluminium_cash = [];
        $aluminium = [];
        $alumina = [];

        foreach($prediksi as $p){
            $categories[] = $p->tanggal;
            $aluminium_cash[] = $p->aluminium_cash;
            $aluminium[] = $p->aluminium;
            $alumina[] = $p->alumina;
            
        }

        // dd(json_encode($aluminium));

        return view('data.index',['data_hasil' => $data_hasil,'categories' => $categories,'aluminium_cash' => $aluminium_cash,'aluminium' => $aluminium,'alumina' => $alumina]);
    }
}
