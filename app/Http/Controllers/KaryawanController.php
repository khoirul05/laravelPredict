<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_karyawan = \App\Models\karyawan::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_karyawan = \App\Models\karyawan::all();
        }

        return view('karyawan.index',['data_karyawan' => $data_karyawan]);
    }

    public function create(Request $request)
    {
        \App\Models\karyawan::create($request->all());

        return redirect('/karyawan')->with('sukses','Data berhasil disubmit!');
    }

    public function edit($id)
    {
        $karyawan = \App\Models\karyawan::find($id);
        
        return view('karyawan/edit',['karyawan' => $karyawan]);
    }

    public function update(Request $request,$id)
    {
        $karyawan = \App\Models\karyawan::find($id);
        $karyawan->update($request->all());

        return redirect('/karyawan')->with('sukses','Data berhasil diupdate!');
    }
    
    public function delete($id)
    {
        $karyawan = \App\Models\karyawan::find($id);
        $karyawan->delete();
        
        return redirect('/karyawan')->with('sukses','Data berhasil dihapus!');
    }
    
    public function profile($id)
    {
        $karyawan = \App\Models\karyawan::find($id);
        return view('karyawan.profile',['karyawan' => $karyawan]);
    }
}
