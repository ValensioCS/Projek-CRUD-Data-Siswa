<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\Sikap;
use Illuminate\Http\Request;

class SikapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sikaps = Sikap::all();
        return view('sikap.index', compact('sikaps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all(); // Ambil semua data siswa dari tabel siswa
        // dd($siswa);
        return view('sikap.create', compact('siswa')); // Kirim data ke view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate that 'siswa_id' is a valid ID from the 'siswas' table
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id', // Validate that the siswa_id exists in the siswas table
            'type' => 'required|string',
            'sikap' => 'required|string',
            'deskripsi' => 'nullable|string',
        ]);
    
        // Create a new Sikap record for the selected siswa
        Sikap::create([
            'siswa_id' => $validated['siswa_id'], // Store the valid siswa_id in the sikap table
            'name' => Siswa::findOrFail($validated['siswa_id'])->name, // Store the student's name based on the ID
            'type' => $validated['type'],
            'sikap' => $validated['sikap'],
            'deskripsi' => $validated['deskripsi'],
        ]);
    
        return redirect()->route('sikap.create')->with('success', 'Data berhasil ditambahkan!');
    }
    



    /**
     * Display the specified resource.
     */
    public function show(Sikap $sikap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sikap = Sikap::find($id);
        return view('sikap.edit', compact('sikap'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'sikap' => 'required',
            'type' => 'required',
            'deskripsi' => 'required|min:10',
        ]);

        Sikap::where('id', $id)->update([
            'name' => $request->name,
            'sikap' => $request->sikap,
            'type' => $request->type,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('sikap.home')->with('success', 'Data sikap berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Sikap::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data sikap berhasil dihapus');
    }
}
