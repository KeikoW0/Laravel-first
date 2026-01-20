<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminSubjectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $subjects = Subject::when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('components.admin.pages.subject', [
            'title' => 'Subject List',
            'subjects' => $subjects
        ]);
    }

    public function store(Request $request)
    {
        Subject::create($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]));

        return back()->with('success', 'Subject ditambahkan');
    }

    public function update(Request $request, Subject $subject)
    {
        $subject->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]));

        return back()->with('success', 'Subject diupdate');
    }
}
