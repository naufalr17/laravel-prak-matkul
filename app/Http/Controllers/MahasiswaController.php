<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->view('mahasiswas.index', [
            'mahasiswas' => Mahasiswa::orderBy('updated_at', 'desc')->get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('mahasiswas.form');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // return response()->view('mahasiswas.show', [
        //     'mahasiswas' => Mahasiswa::findOrFail($id),
        // ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return response()->view('mahasiswas.form', [
            'mahasiswas' => Mahasiswa::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $mahasiswa = Mahasiswa::all();
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $post = Mahasiswa::findOrFail($id);
        
        $delete = $post->delete($id);

        if($delete) {
            // session()->flash('notif.success', 'Post deleted successfully!');
            return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa deleted successfully.');
        }

        return abort(500);
    }
}
