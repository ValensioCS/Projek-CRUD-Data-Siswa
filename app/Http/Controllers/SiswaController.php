<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswas.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all(); // Mengambil semua data siswa dari tabel siswas
        return view('siswas.create', compact('siswa'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|min:3',
           'nis' => 'required|min:8',
           'type' => 'required',
           'umur' => 'required|numeric',
        ]);

        Siswa::create ([
            'name' => $request->name,
            'nis' => $request->nis,
            'type' => $request->type,
            'umur' => $request->umur
        ]);

        return redirect()->back()->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswas.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'umur' => 'required|numeric',
        ]);

        Siswa::where('id', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'umur' => $request->umur,
        ]);

        return redirect()->route('siswa.home')->with('success', 'Data siswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Siswa::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data siswa berhasil dihapus');
    }
}
