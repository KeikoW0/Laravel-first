<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminProfilController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Profile',
            'nama' => 'Keiko Shafira Wiyana',
            'kelas' => '11 PPLG 1',
            'sekolah' => 'SMK Raden Umar Said'
        ];

        return view('components.admin.pages.profil', $data);
    }
}