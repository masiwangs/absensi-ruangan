<?php

namespace App\Http\Controllers;

use App\Models\LogVisitor;
use App\Models\Ruangan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class LogController extends Controller
{
    public function index(Request $request) {
        $logs = LogVisitor::orderBy('id');
        if($request->ruangan) {
            $ruangan = Ruangan::where('nama', 'like', '%'.$request->ruangan.'%')->first();
            $logs = $logs->where('ruangan_id', $ruangan->id);
        }
        $logs = $logs->get();
        $ruangans = Ruangan::get();
        return view('admin.log.index', compact('logs', 'ruangans'));
    }

    public function store(Request $request) {
        $request->validate([
            'ruangan' => 'required',
            'nama_visitor' => 'required',
            'nama_perusahaan' => 'required',
            'jam_masuk' => 'required',
        ]);

        $ruangan = Ruangan::find($request->ruangan);

        if(!$ruangan) {
            notify()->error('Ruangan tidak ditemukan');
            return back();
        }

        $pic = User::where('name', $request->pic)->first();
        if(!$pic) {
            notify()->error('PIC tidak ditemukan');
            return back();
        }

        LogVisitor::create([
            'nama_visitor' => $request->nama_visitor,
            'nama_perusahaan' => $request->nama_perusahaan,
            'jam_masuk' => Carbon::createFromTimeString($request->jam_masuk),
            'jam_keluar' => $request->jam_keluar ? Carbon::createFromTimeString($request->jam_keluar) : null,
            'keperluan' => $request->keperluan,
            'ruangan_id' => $request->ruangan,
            'pic_id' => $pic->id,
            'tanggal' => $request->tanggal ?? Date::now() // if no date inputed, it will automated to now()
        ]);

        notify()->success('Log telah disimpan.');
        return back();
    }

    public function edit($id) {
        $log = LogVisitor::find($id);
        $ruangans = Ruangan::where('tersedia', 1)->orderBy('nama')->get();
        $pics = User::where('role', 'pic')->orderBy('name')->get();
        return view('admin.log.edit', compact('log', 'ruangans', 'pics'));
    }

    public function update($id, Request $request) {
        $log = LogVisitor::find($id);

        $ruangan = Ruangan::find($request->ruangan);

        if(!$ruangan) {
            notify()->error('Ruangan tidak ditemukan');
            return back();
        }

        $pic = User::where('name', $request->pic)->first();
        if(!$pic) {
            notify()->error('PIC tidak ditemukan');
            return back();
        }

        if($log) {
            $log->update([
                'nama_visitor' => $request->nama_visitor,
                'nama_perusahaan' => $request->nama_perusahaan,
                'jam_masuk' => Carbon::createFromTimeString($request->jam_masuk.':00'),
                'jam_keluar' => $request->jam_keluar ? Carbon::createFromTimeString($request->jam_keluar.':00') : null,
                'keperluan' => $request->keperluan,
                'ruangan_id' => $request->ruangan,
                'pic_id' => $pic->id,
                'tanggal' => $request->tanggal
            ]);

            notify()->success('Log telah diupdate');
            return redirect()->route('admin.log.index');
        } else {
            notify()->error('Terjadi kesalahan');
            return back();
        }

    }

    public function keluar($id) {
        $log = LogVisitor::find($id);

        if($log) {
            $log->update([
                'jam_keluar' => Carbon::now()
            ]);
            notify()->success('Log telah diperbarui');
        } else {
            notify()->error('Log tidak ditemukan');
        }

        return back();
    }
}
