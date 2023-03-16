<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RPS;
use App\Models\CPLMK;
use App\Models\Kurikulum;
use App\Models\MK;
use App\Models\Soal;

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
}
