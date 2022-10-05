<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RPS;
use App\Models\MK;
use App\Models\Activity;

class RpsController extends Controller
{
    public function list()
    {
        $rpss = RPS::all();
        $mks = MK::all();
        return view('admin.rps.list', compact('rpss', 'mks'));
    }

    public function print($id)
    {
        $rps = RPS::findOrFail($id);
        $mks = MK::all();
        $activities = Activity::all();
        return view('admin.rps.print', compact('rps', 'activities', 'mks'));
    }
}
