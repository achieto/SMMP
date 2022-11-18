<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\RPS;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function Add()
    {
        $rpss = RPS::where('pengembang', auth()->user()->name)->get();
        // $mks = collect();
        // foreach ($rpss as $rps) {
        //     $id_mk = $rps->id_mk;
        //     $mk = MK::find($id_mk);
        //     $mks->push($mk);
        // }
        // $cpls = CPL::orderBy('aspek', 'desc')->get();
        return view('dosen.activities.add',compact('rpss'));
    }
}
