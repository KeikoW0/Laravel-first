<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminTeacherController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $teachers = Teacher::with('subject')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%")
                      ->orWhere('address', 'like', "%{$search}%")
                      ->orWhereHas('subject', function ($q) use ($search) {
                          $q->where('name', 'like', "%{$search}%");
                      });
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

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

        return back()->with('success', 'Teacher berhasil ditambahkan');
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

        return back()->with('success', 'Teacher berhasil diupdate');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return back()->with('success', 'Teacher berhasil dihapus');
    }
}
