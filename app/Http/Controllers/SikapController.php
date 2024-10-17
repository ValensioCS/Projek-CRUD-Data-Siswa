<?php

namespace App\Http\Controllers;

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
        return view('sikap.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|min:3',
            'sikap' => 'required',
            'type' => 'required',
            'deskripsi' => 'required|min:10',
        ]);

        Sikap::create([
            'name' => $request->name,
            'sikap' => $request->sikap,
            'type' => $request->type,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->back()->with('success', 'Data sikap berhasil ditambahkan');
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
