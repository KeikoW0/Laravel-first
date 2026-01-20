<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\Request;

class AdminGuardianController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $guardians = Guardian::when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('job', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('address', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('components.admin.pages.guardian', [
            'title' => 'Guardian List',
            'guardians' => $guardians
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:guardians,email',
            'address' => 'required|string|max:500',
        ]);

        Guardian::create($validated);

        return back()->with('success', 'Guardian berhasil ditambahkan!');
    }

    public function update(Request $request, Guardian $guardian)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:guardians,email,' . $guardian->id,
            'address' => 'required|string|max:500',
        ]);

        $guardian->update($validated);

        return back()->with('success', 'Guardian berhasil diupdate!');
    }

    public function destroy(Guardian $guardian)
    {
        $guardian->delete();

        return back()->with('success', 'Guardian berhasil dihapus!');
    }
}
