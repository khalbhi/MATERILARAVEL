<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas;
use Illuminate\Support\Facades\DB;

class FakultasController extends Controller
{
    //
    public function index(){
        $fakultas = Fakultas::all();
        //$fakultas = DB::select("SELECT * FROM fakultas");
        $kampus = "Universitas MDP";
        return view("fakultas.index", compact('fakultas', 'kampus'));
    }

    public function detail($id = null){
        $fakultas = Fakultas::find($id);
        $kampus = "Universitas MDP";
        return view("fakultas.detail", compact('fakultas', 'kampus'));
    }

    public function insert(){
        $data = ["Fakultas Ilmu Sosial dan Politik", "SOS", "sospol@mdp.ac.id", "2022-04-14", "Palembang"];
        $result = DB::insert("insert into fakultas (nama, kode, email, tgl_berdiri, alamat) values (?, ?, ?, ?, ?)", $data);

        dump($result);
    }

    public function update(){
        $data = ["Fakultas Kehutanan", 3];
        $result = DB::update("update fakultas set nama = ? where id = ?", $data);
        
        dump($result);
    }

    //insert menggunakan eloquent
    public function insertElq(){
        $data = [
            "nama" => "Fakultas Pertambabangan", 
            "kode" => "TAM", 
            "email" => "tambang@mdp.ac.id", 
            "tgl_berdiri" => "2022-04-14", 
            "alamat" => "Palembang"];

        //cara 1
        $insert = new Fakultas;
        $insert->nama = "Fakultas Kedoteran";
        $insert->kode = "DOK";
        $insert->email = "";
        $insert->tgl_berdiri = "2022-04-14";
        $insert->alamat = "Palembang";
        $insert->save();

        //cara 2 -> mass assignment
        $fakultas2 = Fakultas::create($data);

        dump($insert);
    }
    //update menggunakan eloquent
}
