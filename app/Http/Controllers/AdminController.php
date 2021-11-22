<?php

namespace App\Http\Controllers;

use App\Models\LogVisitor;
use App\Models\Ruangan;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        $count_ruangan = Ruangan::count();
        $count_visitor = LogVisitor::count();
        $count_pic = User::where('role', 'pic')->count();
        $last_five_logs = LogVisitor::orderByDesc('id')->limit(5)->get();
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
                'tanggal')
            ->where('tanggal', '>=', $log_start)
            ->get()
        );
        $log_data = [];
        $log_label = [];
        foreach ($ruangans as $index => $ruangan) {
            $temp_data = [];
            foreach ($log_periode as $periode) {
                array_push(
                    $temp_data,
                    $log_collection->where('ruangan_id', $ruangan->id)
                        ->where('tanggal', $periode->format('Y-m-d'))->count()
                );
                // if($periode->format('Y-m-d') == '2021-11-21'){
                //     return $log_collection;
                // }
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

    public function profile() {
        return view('admin.profile.index');
    }

    public function profileUpdate(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required'
        ]);

        $user = User::find(auth()->id());
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function security() {
        return view('admin.profile.security');
    }

    public function securityUpdate(Request $request) {
        $request->validate([
            'password' => 'required|min:6',
            'password_confirm' => 'required|min:6|same:password',
        ]);

        $user = User::find(auth()->id());
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
