<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\CPL;
use App\Models\MK;
use App\Models\User;

class DosenController extends Controller
{
    public function rpsAdd(){
        $mks = MK::all();
        $users = User::all();
        return view('dosen.rps.add', compact('mks','users'));
    }
    public function cplAdd(){
        $mks = MK::all();
        $cpls = CPL::all();
        return view('dosen.cpl.add', compact('mks','cpls'));
    }

    public function cplList()
    {
        $cpls = CPL::all();
        return view('dosen.cpl.list', compact('cpls'));
    }
    public function dashboard(){
        return view('dosen.dashboard');
    }
}
