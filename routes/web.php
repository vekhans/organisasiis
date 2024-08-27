<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\JenisArsipController;
use App\Http\Controllers\admin\JenisBeritaController;
use App\Http\Controllers\admin\KontakController;
use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\ArsipController;
use App\Http\Controllers\admin\MediaBeritaController;
use App\Http\Controllers\admin\KomentarBeritaController;
use App\Http\Controllers\admin\PidioController;
use App\Http\Controllers\admin\SlideController;
use App\Http\Controllers\admin\ProfilController;
use App\Http\Controllers\admin\MediaProfilController;
use App\Http\Controllers\admin\ProvinsiController;
use App\Http\Controllers\admin\KabupatenController;
use App\Http\Controllers\admin\KecamatanController;
use App\Http\Controllers\admin\DesaController;
use App\Http\Controllers\admin\AnggotaController;
use App\Http\Controllers\admin\CabangController;
use App\Http\Controllers\admin\AnggotaCabangController;
use App\Http\Controllers\admin\PermandianController;
use App\Http\Controllers\admin\PengesahanController;
use App\Http\Controllers\admin\RekomController;
use App\Http\Controllers\admin\PernikahanController;
use App\Http\Controllers\depan\MukaController;
use App\Http\Controllers\depan\ArsipsController;
use App\Http\Controllers\depan\SontaksController;
 


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

 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin','namespace'],function(){
Route::resource('/admin', AdminController::class);
Route::resource('/profil', ProfilController::class);
Route::resource('/profil/{media_profil}/mepro',MediaProfilController::class);
Route::get('/profil/{id?}/logos', [ProfilController::class, 'elogo'])->name('elogo');

Route::put('/profil/{id?}/uplogo', [ProfilController::class, 'uplogo'])->name('uplogo');
Route::get('/profil/{id?}/strukturs', [ProfilController::class, 'estruktur'])->name('estruktur');
Route::put('/profil/{id?}/upstruktur', [ProfilController::class, 'upstruktur'])->name('upstruktur');
Route::resource('/provinsi', ProvinsiController::class);
Route::resource('/provinsi/{provinsi}/kabupaten', KabupatenController::class);
Route::resource('/provinsi/{provinsi}/kabupaten/{kabupaten}/kecamatan', KecamatanController::class);
Route::resource('/provinsi/{provinsi}/kabupaten/{kabupaten}/kecamatan/{kecamatan}/desa', DesaController::class); 
Route::resource('/anggota', AnggotaController::class);
Route::get('/anggota/{id?}/epernikahan', [AnggotaController::class, 'epernikahan'])->name('epernikahan');
Route::put('/anggota/{id?}/uppernikahan', [AnggotaController::class, 'uppernikahan'])->name('uppernikahan');

Route::get('/anggota/{id?}/profil', [AnggotaController::class, 'detailanggota'])->name('detailanggota');

Route::get('/anggota/{id?}/erekom', [AnggotaController::class, 'erekom'])->name('erekom');
Route::put('/anggota/{id?}/uprekom', [AnggotaController::class, 'uprekom'])->name('uprekom');

Route::get('/anggota/{id?}/epermandian', [AnggotaController::class, 'epermandian'])->name('epermandian');
Route::get('/anggota/{id?}/views', [AnggotaCabangController::class, 'lihatss'])->name('lihat');
Route::put('/anggota/{id?}/uppermandian', [AnggotaController::class, 'uppermandian'])->name('uppermandian');

Route::get('/anggota/{id?}/epengesahan', [AnggotaController::class, 'epengesahan'])->name('epengesahan');
Route::put('/anggota/{id?}/uppengesahan', [AnggotaController::class, 'uppengesahan'])->name('uppengesahan');

Route::resource('/anggota/{anggota}/permandian', PermandianController::class);
Route::resource('/anggota/{anggota}/pernikahan', PernikahanController::class);
Route::resource('/anggota/{anggota}/pengesahan', PengesahanController::class);
Route::resource('/anggota/{anggota}/rekom', RekomController::class);
Route::resource('/cabang', CabangController::class);
Route::resource('/cabang/{cabang}/anggotacabang', AnggotaCabangController::class);

Route::resource('/slide', SlideController::class);
Route::resource('/video', PidioController::class); 
Route::resource('/jenisberita', JenisBeritaController::class);
Route::resource('/jenisarsip', JenisArsipController::class);
Route::resource('/berita', BeritaController::class);
Route::resource('/arsip', ArsipController::class); 
Route::resource('/kontak', KontakController::class); 
Route::resource('/berita/{media_berita}/meber', MediaBeritaController::class);
Route::resource('/berita/{berita}/komentar',KomentarBeritaController::class);
Route::get('/{id?}/users', [AdminController::class, 'profil'])->name('aprof');
Route::get('/{id?}/edits', [AdminController::class, 'eprof'])->name('eprof');
Route::put('/{id?}/rubahs', [AdminController::class, 'uprof'])->name('uprof');

Route::put('/berita/{id?}/publish', [BeritaController::class, 'publishit'])->name('beritashit');
	Route::get('/berita/pdf', [BeritaController::class, 'beritaallpdmf'])->name('beritaallpdf');
	Route::get('/baca-beritapdf/{id?}/{slug}', [BeritaController::class, 'genPDF'])->name('detberitapdf');
	Route::get('/berita-pdf', [BeritaController::class, 'generatePDF'])->name('jog');
	Route::put('/berita/{id?}/unpublish', [BeritaController::class, 'unpublishit'])->name('unberitashit');
	Route::get('/baca-berita/{id?}/{slug}', [BeritaController::class, 'adeber'])->name('adeber');
Route::get('/berita-publish', [BeritaController::class,'pablis'])->name('pablis');
Route::get('/berita-unpublish', [BeritaController::class,'unpablis'])->name('unpablis');
 Route::put('/video/{id?}/publish', [PidioController::class,'publishit'])->name('videoshit');
 Route::put('/video/{id?}/unpublish', [PidioController::class,'unpublishit'])->name('unvideoshit');
Route::put('/arsip/{id?}/unpublish', [ArsipController::class,'unpublishit'])->name('unpublishit');
Route::put('/arsip/{id?}/publish', [ArsipController::class,'publishit'])->name('publishit');
Route::get('/baca-arsip/{id?}/{slug}',[ArsipController::class,'arsipsip'])->name('arsipsip');

});




Route::get('/', [MukaController::class,'index'])->name('beranda');
Route::get('/video', [MukaController::class, 'pidio'])->name('pidio');
Route::get('/profil', [MukaController::class, 'profil'])->name('profil');
Route::get('/berita', [MukaController::class, 'berall'])->name('berall');
Route::get('/arsip', [ArsipsController::class, 'index'])->name('arsipall');
Route::get('/kontak', [SontaksController::class, 'index'])->name('pesans');
Route::get('/anggotas', [MukaController::class, 'carisanggota'])->name('carisanggota');
Route::get('/profilsanggota/{id?}', [MukaController::class, 'profilsanggota'])->name('profilsanggota');
Route::post('/kontak/save/', [SontaksController::class, 'saves'])->name('kontak.save');
Route::get('/berita/{ket?}/{ket2?}',[MukaController::class, 'berall'])->name('berall');
Route::get('/arsip/{ket?}/{ket2?}',[ArsipsController::class, 'index'])->name('arsipall');
Route::get('/baca-berita/{id?}/{slug}',[MukaController::class, 'deber'])->name('deber');
Route::get('/baca-arsip/{id?}/{slug}',[ArsipsController::class, 'arsips'])->name('arsips');
Route::post('/komentar/{id}/{idkomentar?}',[MukaController::class,'komentarBerita'])->name('berita.komentar');


