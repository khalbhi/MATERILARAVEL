<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hallo', function () {
    //return array("nama" => "Nur Rachmat");
    echo "<h1>Selamat Datang</h1>";
    echo "<a href='".route("call")."'>Hubungi Kami</a><br/>";
    echo "<a href='".route("mhs", ["BOBO", "1213212"])."'>Mahasiswa</a>";
});

Route::get('/mahasiswa/{nama?}/{npm?}', 
function ($nama = Null, $npm = null) {
    return array("nama" => $nama);
})->where('nama', '[A-Z]+')->name("mhs");

Route::get('/hubungikami', function () {
    echo "<h1>Hubungi Kami</h1>";
})->name("call");

Route::prefix("/pengajar")->group(function(){
    Route::get('/jadwal', function () {
        return view('welcome');
    });
    Route::get('/materi', function () {
        return view('welcome');
    });
});

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;

Route::get("/fakultas", [FakultasController::class, "index"]);
Route::get("/fakultas/detail/{id}", [FakultasController::class, "detail"])->name("detailfakultas");
Route::get("/fakultas/insert", [FakultasController::class, "insert"]);
Route::get("/fakultas/update", [FakultasController::class, "update"]);

Route::get("/fakultas/insertelq", [FakultasController::class, "insertelq"]);

Route::get("/programstudi", [ProdiController::class, "index"])->name("programstudi.index");
//untuk menapilkan form tambah prodi
Route::get("/programstudi/create", [ProdiController::class, "create"])->name("programstudi.create");
//untuk menyimpan data tambah prodi
Route::post("/programstudi/store", [ProdiController::class, "store"])->name("programstudi.store");

//ke halaman detail /view detail
Route::get("/programstudi/detail/{id}", [ProdiController::class, "show"]);

//ke halaman form edit
Route::get("/programstudi/edit/{id}", [ProdiController::class, "edit"])->name("programstudi.edit");
//untuk mengupdate data edit prodi
Route::patch("/programstudi/update/{id}", [ProdiController::class, "update"])->name("programstudi.update");

//ke fungsi delete/destroy
Route::delete("/programstudi/delete/{id}", [ProdiController::class, "destroy"]);