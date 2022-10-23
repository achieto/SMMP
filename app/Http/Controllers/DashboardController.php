<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CPLMK;
use App\Models\CPL;
use App\Models\MK;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function chart()
    {
        $cplmks = CPLMK::all();
        $cpls = CPL::all();

        $i = -1;
        foreach ($cpls as $cpl) {
            if ($cpl->aspek == 'Sikap') {
                $sikap[++$i] = $cpl->kode;
            }
        }
        $i = -1;
        foreach ($cpls as $cpl) {
            if ($cpl->aspek == 'Umum') {
                $umum[++$i] = $cpl->kode;
            }
        }
        $i = -1;
        foreach ($cpls as $cpl) {
            if ($cpl->aspek == 'Pengetahuan') {
                $pengetahuan[++$i] = $cpl->kode;
            }
        }
        $i = -1;
        foreach ($cpls as $cpl) {
            if ($cpl->aspek == 'Keterampilan') {
                $keterampilan[++$i] = $cpl->kode;
            }
        }
        $i = -1;
        foreach ($cpls as $cpl) {
            if ($cpl->aspek == 'Sikap') {
                $cpl_sikap[++$i] = $cpl->id;
            }
        }
        $i = -1;
        foreach ($cpls as $cpl) {
            if ($cpl->aspek == 'Umum') {
                $cpl_umum[++$i] = $cpl->id;
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
        $sums = 0;
        foreach ($cpl_sikap as $no=>$cpls) {
            $cps[$no] = 0;
            $sums += 1;
        }
        $sumu = 0;
        foreach ($cpl_umum as $no=>$cpls) {
            $cpu[$no] = 0;
            $sumu += 1;
        }
        $sump = 0;
        foreach ($cpl_pengetahuan as $no=>$cpls) {
            $cpp[$no] = 0;
            $sump += 1;
        }
        $sumk = 0;
        foreach ($cpl_keterampilan as $no=>$cpls) {
            $cpk[$no] = 0;
            $sumk += 1;
        }
        foreach ($cpl_sikap as $no => $cpls) {
            foreach ($cplmks as $cplmk) {
                if ($cplmk->id_cpl == $cpls) {
                    $cps[$no] += 1;
                }
            }
        }
        foreach ($cpl_umum as $no => $cpls) {
            foreach ($cplmks as $cplmk) {
                if ($cplmk->id_cpl == $cpls) {
                    $cpu[$no] += 1;
                }
            }
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
        for ($i = 0; $i < $sums; $i++) {
            $warnas[$i] = $list_warna[++$tmp];
            if ($tmp == 5) {
                $tmp = 0;
            }
        }
        $tmp = -1;
        for ($i = 0; $i < $sumu; $i++) {
            $warnau[$i] = $list_warna[++$tmp];
            if ($tmp == 5) {
                $tmp = 0;
            }
        }
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
        for ($i = 0; $i < $sums; $i++) {
            $borders[$i] = $list_border[++$tmp];
            if ($tmp == 5) {
                $tmp = 0;
            }
        }
        $tmp = -1;
        for ($i = 0; $i < $sumu; $i++) {
            $borderu[$i] = $list_border[++$tmp];
            if ($tmp == 5) {
                $tmp = 0;
            }
        }
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
            'sikap' => $sikap,
            'umum' => $umum,
            'pengetahuan' => $pengetahuan,
            'keterampilan' => $keterampilan,
            'jumlahs' => $cps,
            'warnas' => $warnas,
            'borders' => $borders,
            'jumlahu' => $cpu,
            'warnau' => $warnau,
            'borderu' => $borderu,
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
