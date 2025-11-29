<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class AdminClassroomController extends Controller
{
    public function index()
    {
        $classroom = Classroom::with('students')->get();

        return view('components.admin.pages.classroom', [
            'title' => 'Classroom List',
            'classroom' => $classroom,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Classroom::create($validated);

        return redirect()->back()->with('success', 'Classroom berhasil ditambahkan!');
    }

    public function update(Request $request, Classroom $classroom)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $classroom->update($validated);

        return redirect()->back()->with('success', 'Classroom berhasil diupdate!');
    }
}
