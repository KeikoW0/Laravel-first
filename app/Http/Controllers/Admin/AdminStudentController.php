<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;

class AdminStudentController extends Controller
{
    // Menampilkan daftar student + modal tambah
    public function index()
    {
        $students = Student::with('classroom')->get();
        $classrooms = Classroom::all();

        return view('components.admin.pages.student', [
            'title' => 'Student List',
            'students' => $students,
            'classrooms' => $classrooms
        ]);
    }

    // Simpan data student baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brithday' => 'nullable|date',
            'classroom_id' => 'required|exists:classrooms,id',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string|max:500',
        ]);

        Student::create($validated);

        return redirect()->back()->with('success', 'Student berhasil ditambahkan!');
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brithday' => 'nullable|date',
            'classroom_id' => 'required|exists:classrooms,id',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'address' => 'required|string|max:500',
        ]);

        $student->update($validated);

        return redirect()->back()->with('success', 'Student berhasil diupdate!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->back()->with('success', 'Student berhasil dihapus!');
    }
}