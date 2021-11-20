<?php

namespace App\Http\Controllers;

use App\Models\LogVisitor;
use App\Models\Ruangan;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $count_ruangan = Ruangan::count();
        $count_visitor = LogVisitor::count();
        $count_pic = User::where('role', 'pic')->count();
        $last_five_logs = LogVisitor::orderBy('id')->limit(5)->get();
        $ruangans = Ruangan::orderBy('nama')->get();
        $visitor_profile_data = LogVisitor::select('nama_perusahaan', DB::raw('count(nama_perusahaan) as jumlah'))->groupBy('nama_perusahaan')->get();
    
        $ruangans = Ruangan::get();
        $log_end = Carbon::now()->addDay();
        $log_start = Carbon::now()->subMonth()->addDay();
        $log_interval = DateInterval::createFromDateString('1 day');
        $log_periode = new DatePeriod($log_start, $log_interval, $log_end);
        
        $log_collection = collect(
            LogVisitor::select(
                'ruangan_id',
                DB::raw('DATE(jam_masuk) as date'))
            ->where('jam_masuk', '>=', $log_start)
            ->get()
        );
        // return $log_collection->where('date', '2021-11-07')->count();
        $log_data = [];
        $log_label = [];
        foreach ($ruangans as $index => $ruangan) {
            $temp_data = [];
            foreach ($log_periode as $periode) {
                array_push(
                    $temp_data,
                    $log_collection->where('ruangan_id', $ruangan->id)
                        ->where('date', $periode->format('Y-m-d'))->count()
                );
                if($index == 0) {
                    array_push($log_label, $periode->format('Y-m-d'));
                }
            }
            array_push($log_data, [
                'ruangan' => $ruangan->nama,
                'data' => $temp_data
            ]);
        }

        // return $log_data;

        return view(
            'admin.index', 
            compact(
                'count_ruangan', 
                'count_visitor', 
                'count_pic', 
                'last_five_logs',
                'ruangans',
                'visitor_profile_data',
                'log_data',
                'log_label'
            ));
    }
}
