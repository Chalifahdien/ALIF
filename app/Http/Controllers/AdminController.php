<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('ADMIN/index', [
            'tittle' => 'Admin',
            'pekerjaans' => Pekerjaan::get(),
            'total_pengguna' => User::count()
        ]);
    }

    public function index()
    {
        return view('ADMIN/Pekerjaan/permintaan', [
            'tittle' => 'Permintaan Pengajuan',
            'pekerjaans' => Pekerjaan::get()
        ]);
    }
    public function ongoing()
    {
        return view('ADMIN/Pekerjaan/berjalan', [
            'tittle' => 'Pekerjaan Tersedia',
            'pekerjaans' => Pekerjaan::get()
        ]);
    }

    public function history()
    {
        return view('ADMIN/Pekerjaan/riwayat', [
            'tittle' => 'Riwayat Tersedia',
            'pekerjaans' => Pekerjaan::get()
        ]);
    }
    public function users()
    {
        return view('ADMIN/user', [
            'tittle' => 'Users',
            'penggunas' => User::get()
        ]);
    }
}
