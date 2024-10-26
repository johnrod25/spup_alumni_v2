<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degree;

class DegreeController extends Controller
{
    public function create()
    {
        return view('public.Admin.add_degree');
    }

    public function store(Request $request)
    {
        $request->validate([
            'degree_name' => 'required|string|max:255|unique:degrees,name',
        ]);

        $degree = new Degree;
        $degree->name = $request->degree_name;
        $degree->save();

        return redirect()->route('admin-manage-degree')->with('success', 'Degree added successfully!');
    }

    public function index()
    {
        $degrees = Degree::all();
        return view('public.Admin.manage_degree', compact('degrees'));
    }

    public function edit($id)
    {
        $degree = Degree::findOrFail($id);
        return view('public.Admin.edit_degree', compact('degree'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'degree_name' => 'required|string|max:255|unique:degrees,name,' . $id,
        ]);

        $degree = Degree::findOrFail($id);
        $degree->name = $request->degree_name;
        $degree->save();

        return redirect()->route('admin-manage-degree')->with('success', 'Degree updated successfully!');
    }

    public function destroy($id)
    {
        $degree = Degree::findOrFail($id);
        $degree->delete();

        return redirect()->route('admin-manage-degree')->with('success', 'Degree deleted successfully!');
    }

    public function getAllDegrees()
    {
        $degrees = Degree::all();
        return response()->json($degrees);
    }

    public function fetchDegrees()
    {
        // Fetch degrees from the database, assuming you have a Degree model
        $degrees = Degree::all();

        return response()->json([
            'response' => 'success',
            'degrees' => $degrees
        ]);
    }
}
