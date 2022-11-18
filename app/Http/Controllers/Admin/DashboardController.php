<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CPLMK;
use App\Models\CPL;
use App\Models\Kurikulum;
use App\Models\MK;

class DashboardController extends Controller
{
    public function index()
    {
        $kurikulums = Kurikulum::all();
        return view('admin.dashboard', compact('kurikulums'));
    }

    public function card($filter)
    {
        if ($filter === 'all') {
            $cpls = CPL::all();
            $mks = MK::all();
        } else {
            $cpls = CPL::where('kurikulum', $filter)->get();
            $mks = MK::where('kurikulum', $filter)->get();
        }

        $sum_mk = 0;
        $sum_cpl = 0;
        foreach ($mks as $mk) {
            ++$sum_mk;
        }
        foreach ($cpls as $cpl) {
            ++$sum_cpl;
        }

        $data = ([
            'sum_mk' => $sum_mk,
            'sum_cpl' => $sum_cpl
        ]);

        return response()->json($data);
    }

    public function chart($filter)
    {
        $cplmks = CPLMK::all();

        if ($filter === 'all') {
            $cpls = CPL::all();
        } else {
            $cpls = CPL::where('kurikulum', $filter)->get();
        }

        $i = -1;
        foreach ($cpls as $cpl) {
            if ($cpl->aspek == 'Pengetahuan') {
                $kode = $cpl->kode;
                $pengetahuan[++$i] = $kode;
            }
        }
        $i = -1;
        foreach ($cpls as $cpl) {
            if ($cpl->aspek == 'Keterampilan') {
                $kode = $cpl->kode;
                $keterampilan[++$i] = $kode;
            }
        }
        $i = -1;
        foreach ($cpls as $cpl) {
            if ($cpl->aspek == 'Pengetahuan') {
                $cpl_pengetahuan[++$i] = $cpl->id;
            }
        }
        $i = -1;
        foreach ($cpls as $cpl) {
            if ($cpl->aspek == 'Keterampilan') {
                $cpl_keterampilan[++$i] = $cpl->id;
            }
        }

        $sump = 0;
        foreach ($cpl_pengetahuan as $no => $cpls) {
            $cpp[$no] = 0;
            $sump += 1;
        }
        $sumk = 0;
        foreach ($cpl_keterampilan as $no => $cpls) {
            $cpk[$no] = 0;
            $sumk += 1;
        }

        foreach ($cpl_pengetahuan as $no => $cpls) {
            foreach ($cplmks as $cplmk) {
                if ($cplmk->id_cpl == $cpls) {
                    $cpp[$no] += 1;
                }
            }
        }
        foreach ($cpl_keterampilan as $no => $cpls) {
            foreach ($cplmks as $cplmk) {
                if ($cplmk->id_cpl == $cpls) {
                    $cpk[$no] += 1;
                }
            }
        }
        $list_warna = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
        ];

        $tmp = -1;
        for ($i = 0; $i < $sump; $i++) {
            $warnap[$i] = $list_warna[++$tmp];
            if ($tmp == 5) {
                $tmp = 0;
            }
        }
        $tmp = -1;
        for ($i = 0; $i < $sumk; $i++) {
            $warnak[$i] = $list_warna[++$tmp];
            if ($tmp == 5) {
                $tmp = 0;
            }
        }
        $list_border = [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
        ];

        $tmp = -1;
        for ($i = 0; $i < $sump; $i++) {
            $borderp[$i] = $list_border[++$tmp];
            if ($tmp == 5) {
                $tmp = 0;
            }
        }
        $tmp = -1;
        for ($i = 0; $i < $sumk; $i++) {
            $borderk[$i] = $list_border[++$tmp];
            if ($tmp == 5) {
                $tmp = 0;
            }
        }
        $dt = ([
            'pengetahuan' => $pengetahuan,
            'keterampilan' => $keterampilan,
            'jumlahp' => $cpp,
            'warnap' => $warnap,
            'borderp' => $borderp,
            'jumlahk' => $cpk,
            'warnak' => $warnak,
            'borderk' => $borderk,
        ]);

        return response()->json($dt);
    }
}
