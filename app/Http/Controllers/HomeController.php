<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $ruangans = Ruangan::where('tersedia', 1)->orderBy('nama')->get();
        $pics = User::where('role', 'pic')->orderBy('name')->get();
        return view('home.index', compact('ruangans', 'pics'));
    }
}
