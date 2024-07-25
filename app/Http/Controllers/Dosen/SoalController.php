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
        $groupedSoals = Soal::where('dosen', auth()->user()->name)
            ->get()
            ->groupBy(['kode_mk', 'jenis']);
        return view('dosen.soal.list', compact('groupedSoals'));
    }

    public function detail($kodeMk, $jenis)
    {
        $soals = Soal::where('dosen', auth()->user()->name)->where('kode_mk', $kodeMk)->where('jenis', $jenis)->get();
        return view('dosen.soal.detail', compact('soals'));
    }

    public function Store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required',
            'prodi' => 'required',
            'kurikulum' => 'required',
            'jenis' => 'required',
            'minggu' => 'required|numeric|min:1|max:16',
            'pertanyaan' => 'required',
            'id_cpmk' => 'required|array',
            'lampiran' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx,xls,xlsx|max:10240',
        ]);
        $data = $request->all();
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/lampiran_soal'), $fileName);
            $data['lampiran'] = $fileName;
        }

        $data['dosen'] = auth()->user()->name;
        $data['status'] = 'Belum';
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
        $cpmks_id = $soal->cpmk->pluck('id');
        return view('dosen.soal.edit', compact('rpss','cpmks_id', 'soal', 'kurikulum'));
    }

    public function Update(Request $request, $id)
    {
        $soal = Soal::findOrFail($id);
        if ($request->hasFile('lampiran')) {
            if (!empty($soal->lampiran)) {
                $oldFilePath = public_path('assets/lampiran_soal/' . $soal->lampiran);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $file = $request->file('lampiran');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/lampiran_soal'), $fileName);
            $data['lampiran'] = $fileName;
        }
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
        if (!empty($soal->lampiran)) {
            $oldFilePath = public_path('assets/lampiran_soal/' . $soal->lampiran);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $soal->cpmk()->sync([]);
        $soal->delete();
        return redirect(route('soal-list'))->with('success', 'Soal successfully removed!');
    }

    public function print($id)
    {
        $ids = Crypt::decrypt($id);
        $soal = soal::findOrFail($ids);
        $data = compact(
            'soal',
        );
        $pdf = PDF::loadView('dosen.soal.print', $data);
        $pdf->setOption('enable-local-file-access', true);
        return $pdf->stream('soal.pdf');
    }

    public function getCpmk($kodeMk)
    {
        $cpmks = CPMK::where('kode_mk', $kodeMk)->get();
        return response()->json($cpmks);
    }
}