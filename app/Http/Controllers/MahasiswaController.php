<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():Response
    {
        //
        return response()->view('mahasiswas.index', [
            'mahasiswas' => Mahasiswa::orderBy('updated_at', 'desc')->get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
        return response()->view('mahasiswas.form');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $create = Mahasiswa::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Mahasiswa created successfully!');
            return redirect()->route('mahasiswas.index');
        }

        return abort(500);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):Response
    {
        
        return response()->view('mahasiswas.show', [
            'mahasiswas' => Mahasiswa::findOrFail($id),
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):Response
    {
        //
        return response()->view('mahasiswas.form', [
            'mahasiswa' => Mahasiswa::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        //
        $mahasiswa = Mahasiswa::findOrFail($id);
        $validated = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        
        $update = $mahasiswa->update($validated);

        if($update) {
            session()->flash('notif.success', 'Mahasiswa updated successfully!');
            return redirect()->route('mahasiswas.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        //

        $mahasiswa = Mahasiswa::findOrFail($id);
        
        $delete = $mahasiswa->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Mahasiswa deleted successfully!');
            return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa deleted successfully.');
        }

        return abort(500);
    }
}
