<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
    //     $data = [
    //         'title' => 'Dashboard',
    //         'students' => 20,
    //         'guardians' => 10,
    //         'classrooms' => 4,
    //         'teachers' => 5,
    //         'subjects' => 5,
    //     ];

        // return view('components.admin.dashboard', $data);
        return view('components.admin.dashboard');
    }
}