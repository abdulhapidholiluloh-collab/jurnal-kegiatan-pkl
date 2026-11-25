<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = Kegiatan::orderBy('tanggal','desc')->get();
        return view('kegiatan.index', compact('kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal'=> 'required|date',
            'judul_kegiatan'=> 'required|string|max:255',
            'deskripsi'=>'required|string',
        ]);
        Kegiatan::create($validated);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
        public function edit(Kegiatan $kegiatan)
    {
        return view('kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'judul_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $kegiatan->update($validated);

        return redirect()->route('kegiatan.index')
                         ->with('success', 'Kegiatan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('kegiatan'.index)
        ->with('success', 'Kegiatan Berhasil dihapus');
    }
}
