<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\CPMK;
use Illuminate\Http\Request;
use App\Models\MK;
use App\Models\RPS;

class CPMKcontroller extends Controller
{
    public function Add()
    {
        $rpss = RPS::where('pengembang', auth()->user()->name)->get();
        $mks = collect();
        foreach ($rpss as $rps) {
            $id_mk = $rps->kode_mk;
            $mk = MK::find($id_mk);
            $mks->push($mk);
        }
        return view('dosen.cpmk.add', compact('mks'));
    }

    public function Store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required',
            'judul' =>
            ['required', 'string', 'regex:/^[a-zA-Z0-9., \/()&*%+_:;]+$/', 'max:255'],
        ]);
        CPMK::create([
            'kode_mk' => $request->kode_mk,
            'judul' => $request->judul,
        ]);
        return redirect(route('cpmk-list'))->with('success', 'New CPMK successfully added!');
    }

    public function List()
    {
        $rpss = RPS::where('pengembang', auth()->user()->name)->get();
        $cpmks = collect();
        foreach ($rpss as $rps) {
            $id_mk = $rps->kode_mk;
            $temp = cpmk::where('kode_mk', $id_mk)->get();
            foreach ($temp as $cpmk) {
                $mk = MK::firstWhere('kode',$cpmk->kode_mk);
                $cpmk->mk = $mk->nama;
                $cpmks->push($cpmk);
            }
        }
        return view('dosen.cpmk.list', compact('cpmks'));
    }

    public function Edit($id)
    {
        $cpmk = CPMK::find($id);
        $mk = MK::firstWhere('kode',$cpmk->kode_mk);
        $cpmk->mk = $mk->nama;
        // dd($cpmk);
        return view('dosen.cpmk.edit', compact('cpmk'));
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'kode_mk' => 'required',
            'judul' =>
            ['required', 'string', 'regex:/^[a-zA-Z0-9., \/()&*%-=+_:;]+$/', 'max:255'],
        ]);
        $cpmk = CPMK::findOrFail($id);
        $cpmk->update([
            'kode_mk' => $request->kode_mk,
            'judul' => $request->judul,
        ]);
        return redirect(route('cpmk-list'))->with('success', 'CPMK successfully updated!');
    }
    public function Delete($id)
    {
        CPMK::where('id', $id)->delete();
        return redirect(route('cpmk-list'))->with('success', 'CPMK successfully deleted!');
    }
}
