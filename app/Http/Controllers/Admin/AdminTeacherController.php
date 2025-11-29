<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminTeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('subject')->get();
        $subjects = Subject::all();

        return view('components.admin.pages.teacher', [
            'title' => 'Teacher List',
            'teachers' => $teachers,
            'subjects' => $subjects
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'subject_id' => 'required|exists:subjects,id',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Teacher::create($validated);

        return redirect()->back()->with('success', 'Teacher berhasil ditambahkan!');
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => 'required',
            'subject_id' => 'required|exists:subjects,id',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'required',
            'address' => 'required',
        ]);

        $teacher->update($validated);

        return redirect()->back()->with('success', 'Teacher berhasil diupdate!');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->back()->with('success', 'Teacher berhasil dihapus!');
    }
}
