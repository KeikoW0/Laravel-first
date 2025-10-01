<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Student;

class ClassroomController extends Controller
{
    //
    public function index()
    {
        $classroom = Classroom::all();
        return view('classroom', ['title' => 'Classroom', 'classroom' => $classroom]);
    }
}