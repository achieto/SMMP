<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CPL;
use App\Models\MK;
use App\Models\User;
use App\Models\RPS;
use App\Models\Activity;
use App\Models\CPMK;
use App\Models\CPLMK;

class RPScontroller extends Controller
{
    public function Add()
    {
        $mks = MK::all();
        $users = User::where('otoritas', 'Dosen')->get();
        return view('dosen.rps.add', compact('mks', 'users'));
    }

    public function List()
    {
        $rpss = RPS::where('pengembang', auth()->user()->name)->get();
        $mks = MK::all();
        return view('dosen.rps.list', compact('rpss', 'mks'));
    }


    public function Print($id)
    {
        $rps = RPS::findOrFail($id);
        $mks = MK::all();
        $activities = Activity::all();
        $cplmks = CPLMK::all();
        $cpls = CPL::all();
        $cpmks = CPMK::all();
        $sikaps = CPL::where('aspek', 'Sikap')->get();
        $umums = CPL::where('aspek', 'Umum')->get();
        $pengetahuans = CPL::where('aspek', 'Pengetahuan')->get();
        $keterampilans = CPL::where('aspek', 'Keterampilan')->get();
        return view('dosen.rps.print', compact(
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
        ));
    }
    public function Store(Request $request)
    {
        $request->validate([
            'nomor' => ['required', 'unique:rpss', 'regex:/^[0-9\/]+$/'],
            'prodi' => ['required', 'string', 'max:255'],
            'mataKuliah' => 'required',
            'semester' => ['required', 'integer', 'digits:1'],
            'dosen' =>
            ['nullable', 'string', 'regex:/^[a-zA-Z., ]+$/', 'max:255'],
            'kaprodi' =>
            ['required', 'string', 'regex:/^[a-zA-Z., ]+$/', 'max:255'],
            'kurikulum' => ['required', 'integer', 'digits:4'],
            'pengembang' =>
            ['required', 'string', 'regex:/^[a-zA-Z., ]+$/', 'max:255'],
            'koordinator' =>
            ['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'pustaka_pendukung' => ['nullable', 'string', 'max:255'],
            'materi_mk' => ['required', 'string', 'max:255'],
            'pustaka_utama' =>
            ['required', 'string', 'regex:/^[a-zA-Z0-9., ()+]+$/', 'max:255'],
        ]);
        if ($request->pustaka_pendukung == null) {
            $p = 'Tidak ada';
        } else {
            $p = $request->pustaka_pendukung;
        }
        if ($request->dosen == null) {
            $d = 'Tidak ada';
        } else {
            $d = $request->dosen;
        }
        RPS::create([
            'nomor' => $request->nomor,
            'prodi' => $request->prodi,
            'semester' => $request->semester,
            'kurikulum' => $request->kurikulum,
            'id_mk' => $request->mataKuliah,
            'dosen' => $d,
            'pengembang' => $request->pengembang,
            'koordinator' => $request->koordinator,
            'kaprodi' => $request->kaprodi,
            'pustaka_utama' => $request->pustaka_utama,
            'materi_mk' => $request->materi_mk,
            'pustaka_pendukung' => $p,
        ]);
        return redirect('/dosen/rps/list-rps')->with('success', 'New RPS successfully added!');
    }

    public function Edit($id)
    {
        $rps = RPS::findOrFail($id);
        $mks = MK::all();
        $users = User::where('otoritas', 'Dosen')->get();
        return view('dosen.rps.edit', compact('rps', 'users', 'mks'));
    }
    public function Update(Request $request, $id)
    {
        $request->validate([
            'nomor' => ['required', 'regex:/^[0-9\/]+$/'],
            'prodi' => ['required', 'string', 'max:255'],
            'mataKuliah' => 'required',
            'semester' => ['required', 'integer', 'digits:1'],
            'dosen' =>
            ['nullable', 'string', 'regex:/^[a-zA-Z., ]+$/', 'max:255'],
            'kaprodi' =>
            ['required', 'string', 'regex:/^[a-zA-Z., ]+$/', 'max:255'],
            'kurikulum' => ['required', 'integer', 'digits:4'],
            'pengembang' =>
            ['required', 'string', 'regex:/^[a-zA-Z., ]+$/', 'max:255'],
            'koordinator' =>
            ['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'pustaka_pendukung' => ['nullable', 'string', 'max:255'],
            'materi_mk' => ['required', 'string', 'max:255'],
            'pustaka_utama' =>
            ['required', 'string', 'regex:/^[a-zA-Z0-9., ()+]+$/', 'max:255'],
        ]);
        if ($request->pustaka_pendukung == null) {
            $p = 'Tidak ada';
        } else {
            $p = $request->pustaka_pendukung;
        }
        if ($request->dosen == null) {
            $d = 'Tidak ada';
        } else {
            $d = $request->dosen;
        }
        $rps = RPS::findOrFail($id);
        $rps->update([
            'nomor' => $request->nomor,
            'prodi' => $request->prodi,
            'semester' => $request->semester,
            'kurikulum' => $request->kurikulum,
            'id_mk' => $request->mataKuliah,
            'dosen' => $d,
            'pengembang' => $request->pengembang,
            'koordinator' => $request->koordinator,
            'kaprodi' => $request->kaprodi,
            'pustaka_utama' => $request->pustaka_utama,
            'materi_mk' => $request->materi_mk,
            'pustaka_pendukung' => $p,
        ]);
        return redirect('/dosen/rps/list-rps')->with('success', 'RPS successfully updated!');
    }

    public function Delete($id)
    {
        RPS::where('id', $id)->delete();
        return redirect('/dosen/rps/list-rps')->with('success', 'RPS successfully deleted!');
    }
}
