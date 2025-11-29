<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminKontakController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Contact Information',
            'email' => 'keikoshafirawiyana@gmail.com',
            'whatsapp' => '0811-8169-909'
        ];

        return view('components.admin.pages.kontak', $data);
    }
}