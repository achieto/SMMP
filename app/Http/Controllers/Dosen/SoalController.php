<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RPS;
use App\Models\CPLMK;
use App\Models\CPMK;
use App\Models\Kurikulum;
use App\Models\MK;
use App\Models\Soal;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use PDF;

class SoalController extends Controller
{
    public function Add()
    {
        $rpss = RPS::where('pengembang', auth()->user()->name)->get();
        $rps_id = $rpss->pluck('id');
        $kurikulum = Kurikulum::all();
        return view('dosen.soal.add', compact('rpss','kurikulum'));
    }

    public function list()
    {
        $soals = Soal::where('dosen', auth()->user()->name)->get();
        return view('dosen.soal.list', compact('soals'));
    }

    public function Store(Request $request)
    {
        $data = $request->all();
        $data['dosen'] = auth()->user()->name;
        // dd($data);
        $soal = Soal::create($data);
        $soal->cpmk()->attach($data['id_cpmk']);
        return redirect(route('soal-list'))->with('success', 'Soal successfully added!');
    }

    public function Edit($id)
    {
        $soal = Soal::findOrFail($id);
        $rpss = RPS::where('pengembang', auth()->user()->name)->get();
        $rps_id = $rpss->pluck('id');
        $kurikulum = Kurikulum::all();
        // dd($soal->cpmk()->wherePivot('id_cpmk', 450)->first());
        return view('dosen.soal.edit', compact('rpss', 'soal', 'kurikulum'));
    }

    public function Update(Request $request, $id)
    {
        $soal = Soal::findOrFail($id);
        $data = $request->all();
        $data['dosen'] = auth()->user()->name;
        $data['status'] = 1;
        // dd($data);
        $soal->update($data);
        $soal->cpmk()->sync($data['id_cpmk']);
        return redirect(route('soal-list'))->with('success', 'Soal successfully updated!');
    }
    public function Delete($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->cpmk()->sync([]);
        $soal->delete();
        return redirect(route('soal-list'))->with('success', 'Soal successfully removed!');
    }

    public function print($id)
    {
        $ids = Crypt::decrypt($id);
        $soal = soal::findOrFail($ids);
        $mks = MK::all();
        $cpmks = collect();
        $soals = collect();
        $cpmk_soals = collect();
        // $countsoals = collect();
        foreach ($mks as $mk) {
            if ($soal->kode_mk == $mk->kode) {
                $soalss = Soal::where('kode_mk', $mk->kode)->where('jenis', $soal->jenis)->orderBy('id', 'asc')->get();
            }
        }

        foreach ($soalss as $s) $soals->push($s);
        foreach ($soals as $sl) {
            $temp = DB::table('cpmk_soals')->select(DB::raw('id_cpmk, id_soal'))->groupBy('id_cpmk')->orderBy('id_cpmk', 'asc')->get();
            $cpmk_s = $temp->where('id_soal', $sl->id);
            // $count = DB::table('cpmk_soals')->select(DB::raw('id_soal,COUNT(*) as soal_count'))->where('id_soal', $sl->id)->groupBy('id_soal')->orderBy('id_cpmk', 'asc')->get();
            foreach ($cpmk_s as $cpmk) $cpmk_soals->push($cpmk);
            // foreach ($count as $cnt) $countsoals->push($cnt);
        }
        foreach ($cpmk_soals as $c_s) {
            $cpmkss = CPMK::where('id', $c_s->id_cpmk)->get();
            foreach ($cpmkss as $cp) $cpmks->push($cp);
        }
        $mk = MK::where('kode',$soal->kode_mk)->first();
        $data = compact(
            'mk',
            'soal',
            'mks',
            'cpmks',
            'cpmk_soals'
        );
        // dd($data);
        $pdf = PDF::loadView('dosen.soal.print', $data);
        $pdf->setOption('enable-local-file-access', true);
        return $pdf->stream('soal.pdf');
    }
}
