<?php

namespace App\Http\Controllers;

use App\Models\LogVisitor;
use App\Models\Ruangan;
use App\Models\User;
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
    

        return view(
            'admin.index', 
            compact(
                'count_ruangan', 
                'count_visitor', 
                'count_pic', 
                'last_five_logs',
                'ruangans',
                'visitor_profile_data'
            ));
    }
}
