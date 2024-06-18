<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('USER/index', ['tittle' => ' ', 'name' => 'Chalifahdien Hamud']);
    }

    public function adminview()
    {
        $pengguna = User::all();
        return response()->json($pengguna);
    }

    public function ambil()
    {
        return view('USER/Pekerjaan/ambil', [
            'tittle' => 'Pekerjaan Tersedia',
            'name' => 'Chalifahdien Hamud',
            'pekerjaans' => Pekerjaan::with('pengguna')->get()
        ]);
    }

    public function detailPekerjaan(Pekerjaan $pekerjaan)
    {
        return view('USER/Pekerjaan/detail', [
            'tittle' => 'Detail Pekerjaan',
            'name' => 'Chalifahdien Hamud',
            'pekerjaan' => $pekerjaan
        ]);
    }

    public function pekerjaanUser(User $pengguna)
    {
        return view('USER/Pekerjaan/ambil', [
            'tittle' => 'Pekerjaan By' . $pengguna->nama_lengkap,
            'name' => 'Chalifahdien Hamud',
            'pekerjaans' => $pengguna->pekerjaan
        ]);
    }

}
