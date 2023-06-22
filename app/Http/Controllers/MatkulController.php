<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->view('matkuls.index', [
            'matkuls' => Matkul::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('matkuls.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'matakuliah' => 'required',
            'jadwal' => 'required',
        ]);

        $create = Matkul::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Mata Kuliah created successfully!');
            return redirect()->route('matkuls.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->view('matkuls.show', [
            'matkuls' => Matkul::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return response()->view('matkuls.form', [
            'matkul' => Matkul::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $matkul = Matkul::findOrFail($id);
        $validated = $request->validate([
            'matakuliah' => 'required',
            'jadwal' => 'required',
        ]);

        
        $update = $matkul->update($validated);

        if($update) {
            session()->flash('notif.success', 'Mata Kuliah updated successfully!');
            return redirect()->route('matkuls.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $matkul = Matkul::findOrFail($id);
        
        $delete = $matkul->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Mata Kuliah deleted successfully!');
            return redirect()->route('matkuls.index')->with('success', 'Mata Kuliah deleted successfully.');
        }

        return abort(500);
    }
}
