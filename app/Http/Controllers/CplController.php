<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CPL;

class CplController extends Controller
{
    public function create()
    {
        return view('admin.cpl.add');
    }

    public function list()
    {
        $cpls = CPL::all();
        return view('admin.cpl.list', compact('cpls'));
    }
}
