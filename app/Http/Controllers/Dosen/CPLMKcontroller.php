<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CPL;
use App\Models\MK;
use App\Models\RPS;
use App\Models\CPLMK;

class CPLMKcontroller extends Controller
{
    public function Add()
    {
        $rpss = RPS::where('pengembang', auth()->user()->name)->get();
        $mks = collect();
        foreach ($rpss as $rps) {
            $id_mk = $rps->id_mk;
            $mk = MK::find($id_mk);
            $mks->push($mk);
        }
        $cpls = CPL::orderBy('aspek', 'desc')->get();
        return view('dosen.cplmk.add', compact('mks', 'cpls'));
    }

    public function List()
    {
        $rpss = RPS::where('pengembang', auth()->user()->name)->get();
        $mks = collect();
        foreach ($rpss as $rps) {
            $id_mk = $rps->id_mk;
            $mk = MK::find($id_mk);
            $mks->push($mk);
        }
        $cplmks = collect();
        foreach ($mks as $mk) {
            $kode_mk = $mk->kode;
            $temp = CPLMK::where('kode_mk', $kode_mk)->get();
            foreach ($temp as $cplmk) {
                $cplmks->push($cplmk);
            }
        }
        $cpls = CPL::all();
        return view('dosen.cplmk.list', compact('cplmks', 'mks', 'cpls'));
    }

    public function Store(Request $request)
    {
        for ($i = 0; $i < count($request->input('id_cpl')); $i++) {
            CPLMK::create([
                'kode_mk' => $request->kode_mk,
                'id_cpl' => $request->input('id_cpl')[$i],
            ]);
        }
        return redirect(route('cplmk-list'))->with('success', 'CPL successfully added!');
    }

    public function Delete($id)
    {
        CPLMK::where('id', $id)->delete();
        return redirect(route('cplmk-list'))->with('success', 'Kode CPL successfully removed!');
    }
}
