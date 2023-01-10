<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\Models\RPS;
use App\Models\MK;
use App\Models\Activity;
use App\Models\CPLMK;
use App\Models\CPL;
use App\Models\CPMK;
use Illuminate\Support\Facades\Crypt;

class RpsController extends Controller
{
    public function list()
    {
        $rpss = RPS::orderBy('created_at', 'desc')->get();
        $mks = MK::all();
        return view('admin.rps.list', compact('rpss', 'mks'));
    }

    public function print($id)
    {
        $ids = Crypt::decrypt($id);
        $rps = RPS::findOrFail($ids);
        $mks = MK::all();
        $activities = Activity::all();
        $cplmks = collect();
        $pengetahuans = collect();
        $keterampilans = collect();
        foreach ($mks as $mk) {
            if ($rps->id_mk == $mk->id) {
                $cplmkss = CPLMK::where('kode_mk', $mk->kode)->get();
            }
        }
        foreach ($cplmkss as $c) $cplmks->push($c);
        foreach ($cplmks as $cplmk) {
            $pengetahuan = CPL::where('aspek', 'Pengetahuan')->where('id', $cplmk->id_cpl)->get();
            $keterampilan = CPL::where('aspek', 'Keterampilan')->where('id', $cplmk->id_cpl)->get();
            foreach ($keterampilan as $k) $keterampilans->push($k);
            foreach ($pengetahuan as $p) $pengetahuans->push($p);
        }
        $cpls = CPL::all();
        $cpmks = CPMK::all();
        $sikaps = CPL::where('aspek', 'Sikap')->where('kurikulum', $rps->kurikulum)->get();
        $umums = CPL::where('aspek', 'Umum')->where('kurikulum', $rps->kurikulum)->get();

        $data = compact(
            'rps',
            'activities',
            'mks',
            'cplmks',
            'cpls',
            'cpmks',
            'sikaps',
            'umums',
            'pengetahuans',
            'keterampilans'
        );

        $pdf = PDF::loadView('admin.rps.print', $data)->setOrientation('landscape');
        $pdf->setOption('enable-local-file-access', true);
        return $pdf->stream('rps.pdf');
    }
}
