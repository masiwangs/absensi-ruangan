<?php

namespace App\Http\Controllers;

use App\Models\LogVisitor;
use App\Models\Ruangan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    public function exportPreview(Request $request) {
        $logs = LogVisitor::orderBy('id');
        $ruangan = null;
        if($request->ruangan) {
            $ruangan = Ruangan::where('nama', 'like', '%'.$request->ruangan.'%')->first();
            $logs = $logs->where('ruangan_id', $ruangan->id);
        }
        if($request->date) {
            $logs = $logs->where('tanggal', $request->date);
        }
        $logs = $logs->get();
        $ruangans = Ruangan::get();
        return view('admin.log.export', compact('logs', 'ruangans', 'ruangan'));
    }

    public function export(Request $request) {
        $logs = LogVisitor::orderBy('id');
        $ruangan = null;
        if($request->ruangan) {
            $ruangan = Ruangan::where('nama', 'like', '%'.$request->ruangan.'%')->first();
            $logs = $logs->where('ruangan_id', $ruangan->id);
        }
        if($request->date) {
            $logs = $logs->where('tanggal', $request->date);
        }
        $logs = $logs->get();
        $ruangans = Ruangan::get();
        
        $merge_and_center = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ]
        ];
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Data Center Log Indonesia Eximbank');
        $sheet->setCellValue('A2', $request->ruangan ? 'Ruang '.$ruangan->nama : 'Semua ruangan');
        // heading
        $sheet->setCellValue('A4', 'Tanggal')->getStyle('A4')->getFont()->setBold(1);
        $sheet->setCellValue('B4', 'Nomor KTP')->getStyle('B4')->getFont()->setBold(1);
        $sheet->setCellValue('C4', 'Nama')->getStyle('C4')->getFont()->setBold(1);
        $sheet->setCellValue('D4', 'Nomor HP')->getStyle('D4')->getFont()->setBold(1);
        $sheet->setCellValue('E4', 'Perusahaan/Institusi')->getStyle('E4')->getFont()->setBold(1);
        $sheet->setCellValue('F4', 'Jam Masuk')->getStyle('F4')->getFont()->setBold(1);
        $sheet->setCellValue('G4', 'Jam Keluar')->getStyle('G4')->getFont()->setBold(1);
        $sheet->setCellValue('H4', 'Keperluan')->getStyle('H4')->getFont()->setBold(1);
        $sheet->setCellValue('I4', 'PIC TSI')->getStyle('I4')->getFont()->setBold(1);
        // data
        foreach ($logs as $key => $log) {
            $sheet->setCellValue('A'.((int)$key+5), date('d M Y', strtotime($log->tanggal)));
            $spreadsheet->getActiveSheet()->getCell('B'.((int)$key+5))->setValueExplicit($log->ktp, DataType::TYPE_STRING);
            $sheet->setCellValue('C'.((int)$key+5), $log->nama_visitor);
            $sheet->setCellValue('D'.((int)$key+5), $log->hp);
            $sheet->setCellValue('E'.((int)$key+5), $log->nama_perusahaan);
            $sheet->setCellValue('F'.((int)$key+5), $log->jam_masuk);
            $sheet->setCellValue('G'.((int)$key+5), $log->jam_keluar);
            $sheet->setCellValue('H'.((int)$key+5), $log->keperluan);
            $sheet->setCellValue('I'.((int)$key+5), $log->pic->name);
            // cell data type
        }
        // merge and center
        $spreadsheet->getActiveSheet()->mergeCells('A1:I1')->getStyle('A1')->applyFromArray($merge_and_center)->getFont()->setSize(14)->setBold(1);
        $spreadsheet->getActiveSheet()->mergeCells('A2:I2')->getStyle('A2')->applyFromArray($merge_and_center)->getFont()->setSize(14)->setBold(1);
        // column width
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(90, 'px');
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(130, 'px');
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(200, 'px');
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(110, 'px');
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(150, 'px');
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(90, 'px');
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(90, 'px');
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(300, 'px');
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(150, 'px');
        $writer = new Xlsx($spreadsheet);

        $filename = Date::now()->timestamp.'-'.$request->date.'-'.($request->ruangan ?? 'all').'.xlsx';
        $writer->save('download/'.$filename);

        return redirect('/download/'.$filename);
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
            'ktp' => $request->ktp,
            'hp' => $request->hp,
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
                'tanggal' => $request->tanggal,
                'ktp' => $request->ktp,
                'hp' => $request->hp,
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

    public function destroy($id) {
        $log = LogVisitor::find($id);
        $log->delete();
        return back()->with('success', 'Log berhasil dihapus');
    }
}
