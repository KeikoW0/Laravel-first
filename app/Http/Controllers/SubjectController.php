<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Teacher;

class SubjectController extends Controller
{
    //
    public function index()
    {
        $subjects = Subject::all();
        return view('subject', ['title' => 'Subject', 'subjects' => $subjects]);
    }
}
