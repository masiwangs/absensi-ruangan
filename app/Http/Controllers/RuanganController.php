<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index(Request $request) {
        $ruangans = Ruangan::orderBy('nama');

        if($request->nama) {
            $ruangans = $ruangans->where('nama', 'like', '%'.$request->nama.'%');
        }

        if($request->tersedia === 'ya' or $request->tersedia === 'tidak') {
            $ruangans = $ruangans->where('tersedia', $request->tersedia == 'ya' ? 1 : 0);
        }

        $ruangans = $ruangans->get();
        return view('admin.ruangan.index', compact('ruangans'));
    }

    public function create() {
        return view('admin.ruangan.baru');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'kapasitas' => 'numeric',
        ]);

        Ruangan::create([
            'nama' => $request->nama,
            'kapasitas' => $request->kapasitas ?? 0,
            'tersedia' => $request->tersedia ? 1 : 0
        ]);

        notify()->success('Ruangan telah disimpan.');
        return back();
    }

    public function edit($id) {
        $ruangan = Ruangan::find($id);
        return view('admin.ruangan.edit', compact('ruangan'));
    }

    public function update($id, Request $request) {
        $ruangan = Ruangan::find($id);

        if($ruangan) {
            $ruangan->update([
                'nama' => $request->nama,
                'kapasitas' => $request->kapasitas ?? 0,
                'tersedia' => $request->tersedia ? 1 : 0
            ]);
            notify()->success('Ruangan telah diupdate');
        } else {
            notify()->error('Terjadi kesalahan');
        }

        return back();
    }
}
