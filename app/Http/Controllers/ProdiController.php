<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programstudi;

class ProdiController extends Controller
{
    //Tugas : 
    //Tampilkan data Program Studi di dalam Tabel
    //Tampilkan tombol aksi (action) edit dan hapus

    public function index(){
        $programstudi = Programstudi::all();
        $kampus = "Universitas MDP";
        return view("programstudi.index", compact('programstudi', 'kampus'));
    }

    public function create()
    {
       $kampus = "Universitas MDP";
       return view("programstudi.create", compact('kampus'));
    }

    public function store(Request $request)
    {
        //0. Lakukan Validation
        $validation = $request->validate([
           'nama' => 'required|min:5|max:20',
           //field dan atauran lainnya
        ]);

        //1. ambil nilai inputan form
        //2. panggil fungsi insert - boleh raw / eloquent
        $programstudi = new Programstudi();
        $programstudi->nama_prodi = $request->nama; // $validation['nama']
        $programstudi->kode_prodi = $request->kode; 
        $programstudi->id_fakultas = 1;
        $programstudi->save();

        //3. redirect ke halaman index / detail / form create
        $request->session()->flash("info", "Data prodi $request->nama berhasil disimpan!");
        return redirect()->route("programstudi.create");
    }
}


