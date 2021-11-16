<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\MatpelController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\LoginSiswaController;
use App\Http\Controllers\AdministratorController;

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

//Staf
Route::group(['middleware'=>['admin'],'prefix'=>'/administrator'],function() {
    Route::get('/home',[AdministratorController::class,'index'])->name('admin.home');
    Route::prefix('/staf')->group(function () {
            Route::prefix('/guru')->group(function () {
                Route::get('/',[AdministratorController::class,'guru'])->name('admin.staf.guru');
                Route::get('/create',[AdministratorController::class,'createguru'])->name('admin.staf.createguru');
                Route::post('/store',[AdministratorController::class,'storeguru'])->name('admin.staf.storeguru');
                Route::get('/edit/{id}',[AdministratorController::class,'editguru'])->name('admin.staf.editguru');
                Route::put('/update/{id}',[AdministratorController::class,'updateguru'])->name('admin.staf.updateguru');
                Route::delete('/delete/{id}', [AdministratorController::class,'destroyguru'])->name('admin.staf.deleteguru');
            });
            Route::prefix('/administrator')->group(function () {
                Route::get('/',[AdministratorController::class,'main'])->name('admin.staf.admin');
                Route::get('/create',[AdministratorController::class,'create'])->name('admin.staf.create');
                Route::post('/store',[AdministratorController::class,'store'])->name('admin.staf.store');
                Route::get('/edit/{id}',[AdministratorController::class,'edit'])->name('admin.staf.edit');
                Route::put('/update/{id}',[AdministratorController::class,'update'])->name('admin.staf.update');
                Route::delete('/delete/{id}', [AdministratorController::class,'destroy'])->name('admin.staf.delete');
            });
            Route::prefix('/siswa')->group(function () {
                Route::get('/',[SiswaController::class,'siswa'])->name('admin.staf.siswa');
                Route::get('/create',[SiswaController::class,'create'])->name('admin.staf.createsiswa');
                Route::post('/store',[SiswaController::class,'store'])->name('admin.staf.storesiswa');
                Route::get('/edit/{id}',[SiswaController::class,'edit'])->name('admin.staf.editsiswa');
                Route::put('/update/{id}',[SiswaController::class,'update'])->name('admin.staf.updatesiswa');
                Route::delete('/delete/{id}', [SiswaController::class,'destroy'])->name('admin.staf.deletesiswa');
            });
            Route::prefix('/kelas')->group(function () {
                Route::get('/',[KelasController::class,'kelas'])->name('admin.staf.kelas');
                Route::get('/create',[KelasController::class,'create'])->name('admin.staf.createkelas');
                Route::post('/store',[KelasController::class,'store'])->name('admin.staf.storekelas');
                Route::get('/edit/{id}',[KelasController::class,'edit'])->name('admin.staf.editkelas');
                Route::put('/update/{id}',[KelasController::class,'update'])->name('admin.staf.updatekelas');
                Route::delete('/delete/{id}', [KelasController::class,'destroy'])->name('admin.staf.deletekelas');
            });
            Route::prefix('/semester')->group(function () {
                Route::get('/',[SemesterController::class,'semester'])->name('admin.staf.semester');
                Route::get('/create',[SemesterController::class,'create'])->name('admin.staf.createsemester');
                Route::post('/store',[SemesterController::class,'store'])->name('admin.staf.storesemester');
                Route::get('/edit/{id}',[SemesterController::class,'edit'])->name('admin.staf.editsemester');
                Route::put('/update/{id}',[SemesterController::class,'update'])->name('admin.staf.updatesemester');
                Route::delete('/delete/{id}', [SemesterController::class,'destroy'])->name('admin.staf.deletesemester');
            });
            Route::prefix('/mata_pelajaran')->group(function () {
                Route::get('/',[MatpelController::class,'matpel'])->name('admin.staf.matpel');
                Route::get('/create',[MatpelController::class,'create'])->name('admin.staf.creatematpel');
                Route::post('/store',[MatpelController::class,'store'])->name('admin.staf.storematpel');
                Route::get('/edit/{id}',[MatpelController::class,'edit'])->name('admin.staf.editmatpel');
                Route::put('/update/{id}',[MatpelController::class,'update'])->name('admin.staf.updatematpel');
                Route::delete('/delete/{id}', [MatpelController::class,'destroy'])->name('admin.staf.deletematpel');
            });
            Route::prefix('/jadwal_pelajaran')->group(function () {
                Route::get('/',[PelajaranController::class,'pelajaran'])->name('admin.staf.jadwal');
                Route::get('/create',[PelajaranController::class,'create'])->name('admin.staf.createjadwal');
                Route::post('/store',[PelajaranController::class,'store'])->name('admin.staf.storejadwal');
                Route::get('/edit/{id}',[PelajaranController::class,'edit'])->name('admin.staf.editjadwal');
                Route::put('/update/{id}',[PelajaranController::class,'update'])->name('admin.staf.updatejadwal');
                Route::delete('/delete/{id}', [PelajaranController::class,'destroy'])->name('admin.staf.deletejadwal');
            });
            Route::prefix('/informasi')->group(function () {
                Route::get('/',[InformasiController::class,'informasi'])->name('admin.staf.informasi');
                Route::get('/create',[InformasiController::class,'create'])->name('admin.staf.createinformasi');
                Route::post('/store',[InformasiController::class,'store'])->name('admin.staf.storeinformasi');
                Route::get('/edit/{id}',[InformasiController::class,'edit'])->name('admin.staf.editinformasi');
                Route::put('/update/{id}',[InformasiController::class,'update'])->name('admin.staf.updateinformasi');
                Route::delete('/delete/{id}', [InformasiController::class,'destroy'])->name('admin.staf.deleteinformasi');
            });
            Route::prefix('/data_alumni')->group(function () {
                Route::get('/',[AlumniController::class,'alumni'])->name('admin.staf.alumni');
                Route::get('/create',[AlumniController::class,'create'])->name('admin.staf.createalumni');
                Route::post('/store',[AlumniController::class,'store'])->name('admin.staf.storealumni');
                Route::get('/edit/{id}',[AlumniController::class,'edit'])->name('admin.staf.editalumni');
                Route::put('/update/{id}',[AlumniController::class,'update'])->name('admin.staf.updatealumni');
                Route::delete('/delete/{id}', [AlumniController::class,'destroy'])->name('admin.staf.deletealumni');
            });
    });

});

//============================================================================================================================================================
// guru
Route::group(['middleware'=>['guru'],'prefix'=>'/guru'],function() {
    Route::get('/home',[AdministratorController::class,'index'])->name('guru.home');
    Route::get('/event/{id}',[AdministratorController::class,'event'])->name('guru.event');
    Route::get('/guru',[AdministratorController::class,'list_guru'])->name('guru.guru');
    Route::get('/alumni',[AdministratorController::class,'alumni'])->name('guru.alumni');
    Route::get('/siswa',[SiswaController::class,'siswa'])->name('guru.siswa');
    Route::get('/jadwal',[PelajaranController::class,'pelajaran'])->name('guru.pelajaran');
    Route::prefix('/raport')->group(function(){
        Route::get('/',[RaportController::class,'raport'])->name('guru.raport');
        Route::get('/create/{id}',[RaportController::class,'create'])->name('guru.create');
        Route::get('/show/{id}',[RaportController::class,'show'])->name('guru.show');
        Route::post('/store',[RaportController::class,'store'])->name('guru.store');
        Route::get('/edit/{id}',[RaportController::class,'edit'])->name('guru.edit');
        Route::put('/update/{id}',[RaportController::class,'update'])->name('guru.update');
        Route::get('/cetak',[RaportController::class,'cetak'])->name('guru.cetak');
    });
});

// ===========================================================================================================================================================
// siswa
Route::group(['middleware'=>['siswa'],'prefix'=>'/siswa'],function() {
    Route::get('/home',[DataSiswaController::class,'index'])->name('siswa.home');
    Route::get('/jadwal',[DataSiswaController::class,'pelajaran'])->name('siswa.pelajaran');
    Route::get('/event/{id}',[AdministratorController::class,'event'])->name('siswa.event');
    Route::get('/raport',[DataSiswaController::class,'raport'])->name('siswa.raport');
    Route::get('/alumni',[DataSiswaController::class,'alumni'])->name('siswa.alumni');
    Route::get('/guru',[DataSiswaController::class,'guru'])->name('siswa.guru');
    Route::get('/cetak',[DataSiswaController::class,'cetak'])->name('siswa.cetak');
});

Route::get('/siswa/login', [LoginSiswaController::class,'index'])->name('siswa.login');
Route::post('/siswa/login',[LoginSiswaController::class,'authenticate'])->name('siswa.aut');
Route::get('/siswa/logout',[LoginSiswaController::class,'logout'])->name('siswa.logout');

//============================================================================================================================================================
// Login

Route::get('/staf/login', [LoginController::class,'index'])->name('staf.login');
Route::post('/staf/login',[LoginController::class,'authenticate'])->name('staf.aut');
Route::get('/staf/logout',[LoginController::class,'logout'])->name('staf.logout');




