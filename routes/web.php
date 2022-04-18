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

Route::get("/programstudi", [ProdiController::class, "index"]);