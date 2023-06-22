<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        return response()->view('dosens.index', [
            'dosens' => Dosen::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('dosens.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama' => 'required',
            'mata_kuliah' => 'required',
            'dosen_image' => 'required'
        ]);

        // Mahasiswa::create($request->all());

        // return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa created successfully.');

        if ($request->hasFile('dosen_image')) {
             // put image in the public storage
            $filePath = Storage::disk('public')->put('images/dosen/featured-images', request()->file('dosen_image'));
            $validated['dosen_image'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = Dosen::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Data dosen created successfully!');
            return redirect()->route('dosens.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->view('dosens.show', [
            'dosen' => Dosen::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return response()->view('dosens.form', [
            'dosen' => Dosen::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $dosen = Dosen::findOrFail($id);
        $validated = $request->validate([
            'nama' => 'required',
            'mata_kuliah' => 'required',
            'dosen_image' => 'required'
        ]);

        if ($request->hasFile('dosen_image')) {
            // delete image
            Storage::disk('public')->delete($dosen->dosen_image);

            $filePath = Storage::disk('public')->put('images/dosens/dosen-images', request()->file('dosen_image'), 'public');
            $validated['dosen_image'] = $filePath;
        }

        $update = $dosen->update($validated);

        if($update) {
            session()->flash('notif.success', 'Data dosen updated successfully!');
            return redirect()->route('dosens.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dosen = Dosen::findOrFail($id);

        Storage::disk('public')->delete($dosen->dosen_image);
        
        $delete = $dosen->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Data dosen deleted successfully!');
            return redirect()->route('dosens.index');
        }

        return abort(500);
    }
}
