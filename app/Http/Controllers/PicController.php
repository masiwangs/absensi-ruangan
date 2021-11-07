<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PicController extends Controller
{
    public function index(Request $request) {
        $pics = User::where('role', 'pic');
        if($request->name) {
            $pics = $pics->where('name', 'like', '%'.$request->name.'%');
        }
        $pics = $pics->orderBy('name')->get();
        return view('admin.pic.index', compact('pics'));
    }

    public function create() {
        return view('admin.pic.baru');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
        ]);

        notify()->success('PIC telah ditambahkan.');
        return back();
    }
}
