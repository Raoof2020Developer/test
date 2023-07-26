<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::all();
        return view('admin.materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.materials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $newMaterial = new Material;
        $newMaterial->name = $request->name;
        $newMaterial->save();

        session('flash_message', 'A new material is added successfully');

        return redirect()->route('materials.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        return view('admin.materials.edit', compact('material'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'name' => 'string|max:255'
        ]);

        $material->update(['name' => $request->name]);

        session('flash_message', 'The material is updated successfully');

        return redirect()->route('materials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();

        session('flash_message', 'The material is deleted successfully');

        return redirect()->route('materials.index');

    }
}
