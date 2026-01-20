<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class AdminClassroomController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $classrooms = Classroom::withCount('students')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('components.admin.pages.classroom', [
            'title' => 'Classroom List',
            'classrooms' => $classrooms,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Classroom::create($validated);

        return back()->with('success', 'Classroom berhasil ditambahkan!');
    }

    public function update(Request $request, Classroom $classroom)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $classroom->update($validated);

        return back()->with('success', 'Classroom berhasil diupdate!');
    }
}
