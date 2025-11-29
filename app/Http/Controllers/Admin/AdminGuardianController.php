<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\Request;

class AdminGuardianController extends Controller
{
    public function index()
    {
        $guardian = Guardian::all();

        return view('components.admin.pages.guardian', [
            'title' => 'Guardian List',
            'guardian' => $guardian
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'job' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:guardians,email',
            'address' => 'required',
        ]);

        Guardian::create($validated);

        return redirect()->back()->with('success', 'Guardian added successfully!');
    }

    public function update(Request $request, Guardian $guardian)
    {
        $validated = $request->validate([
            'name' => 'required',
            'job' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:guardians,email,' . $guardian->id,
            'address' => 'required',
        ]);

        $guardian->update($validated);

        return redirect()->back()->with('success', 'Guardian updated successfully!');
    }

    public function destroy(Guardian $guardian)
    {
        $guardian->delete();

        return redirect()->back()->with('success', 'Guardian deleted successfully!');
    }
}
