<?php

use App\Http\Controllers\AdminController;
use App\Models\User;
// use App\Models\Pengguna;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Middleware\EnsureUserIsAuthenticated;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;


// ----------------------LOGIN------------------------//
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');;
Route::post('/register', [RegisterController::class, 'store']);

// ----------------------USER-------------------------//

Route::get('/', [UserController::class, 'index'])->middleware('auth');
Route::get('/ajukan', [PekerjaanController::class, 'ajukan'])->middleware('auth');
Route::post('/ajukan', [PekerjaanController::class, 'store']);
Route::get('/ambil', [UserController::class, 'ambil']);
Route::get('/ambil/{pekerjaan:id_pengguna}', [UserController::class, 'detailPekerjaan'])->middleware('auth');
Route::get('pengguna/{pengguna:id_pengguna}', [UserController::class, 'pekerjaanUser'])->middleware('auth');

// Route::middleware([EnsureUserIsAuthenticated::class])->group(function () {
//     Route::get('/',[UserController::class, 'index']);
//     Route::get('/ajukan', [PekerjaanController::class, 'ajukan']);
//     Route::post('/ajukan', [PekerjaanController::class, 'store']);
//     Route::get('/ambil', function () {
//         return view('USER/Pekerjaan/ambil', [
//             'tittle' => 'Pekerjaan Tersedia',
//             'name' => 'Chalifahdien Hamud',
//             'pekerjaans' => Pekerjaan::with('pengguna')->get()
//         ]);
//     });

//     Route::get('ambil/{pekerjaan:id_pengguna}', function (Pekerjaan $pekerjaan) {
//         return view('USER/Pekerjaan/detail', [
//             'tittle' => 'Detail Pekerjaan',
//             'name' => 'Chalifahdien Hamud',
//             'pekerjaan' => $pekerjaan
//         ]);
//     });

//     Route::get('pengguna/{pengguna:id_pengguna}', function (User $pengguna) {
//         return view('USER/Pekerjaan/ambil', [
//             'tittle' => 'Pekerjaan By' . $pengguna->nama_lengkap,
//             'name' => 'Chalifahdien Hamud',
//             'pekerjaans' => $pengguna->pekerjaan
//         ]);
//     });
// });

// Route::middleware([EnsureUserIsAuthenticated::class])->group(function () {
//     Route::get('/', function () {
//         // ...
//     });

//     Route::get('/profile', function () {
//         // ...
//     });
// });


// ----------------------Admin-------------------------//
Route::get('/admin', [AdminController::class, 'dashboard']);
Route::get('/user', [AdminController::class, 'users']);
Route::get('/request', [AdminController::class, 'index']);
Route::get('/ongoing', [AdminController::class, 'ongoing']);
Route::get('/history', [AdminController::class, 'history']);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
