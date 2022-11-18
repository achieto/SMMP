<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CPL;
use App\Models\Kurikulum;
use \stdClass;

class CplController extends Controller
{
    public function create()
    {
        $sikaps = CPL::where('aspek', 'Sikap')->get();
        $umums = CPL::where('aspek', 'Umum')->get();
        $pengetahuans = CPL::where('aspek', 'Pengetahuan')->get();
        $keterampilans = CPL::where('aspek', 'Keterampilan')->orderBy('kurikulum', 'asc')->get();
        $kurikulums = Kurikulum::all();
        return view('admin.cpl.add', compact('sikaps', 'umums', 'pengetahuans', 'keterampilans', 'kurikulums'));
    }

    public function list()
    {
        $sikaps = CPL::where('aspek', 'Sikap')->get();
        $umums = CPL::where('aspek', 'Umum')->get();
        $pengetahuans = CPL::where('aspek', 'Pengetahuan')->get();
        $keterampilans = CPL::where('aspek', 'Keterampilan')->orderBy('kurikulum', 'asc')->get();
        return view('admin.cpl.list', compact('sikaps', 'umums', 'pengetahuans', 'keterampilans'));
    }

    public function store(Request $request)
    {
        foreach ($request->input('kode') as $key => $value) {
            if ($request->aspek == 'Sikap') {
                $data[$key] = 'S' . $value;
            }
            else if ($request->aspek == 'Umum') {
                $data[$key] = 'KU' . $value;
            }
            else if ($request->aspek == 'Pengetahuan') {
                $data[$key] = 'P' . $value;
            }
            else {
                $data[$key] = 'KK' . $value;
            }
        }

        try {
            for ($i = 0; $i < count($request->input('kurikulum')); $i++) {
                CPL::create([
                    'aspek' => $request->aspek,
                    'kurikulum' => $request->input('kurikulum')[$i],
                    'kode' => $data[$i],
                    'nomor' => $request->input('kode')[$i],
                    'judul' => $request->input('judul')[$i]
                ]);
            }
            return redirect('/admin/list-cpl')->with('success', 'CPL successfully added!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput($request->all)->with('error', "Terjadi kesalahan, silahkan periksa kembali data yang diinputkan!");
        }
    }

    public function edit($id)
    {
        $cpl = CPL::findOrFail($id);
        $kurikulums = Kurikulum::all();
        return view('admin.cpl.edit', compact('cpl', 'kurikulums'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'aspek' => 'required',
            'kurikulum' => ['required', 'integer', 'digits:4'],
            'kode' => ['required'],
            'judul' => 'required',
        ]);

        $cpl = CPL::findOrFail($id);
        if($request->aspek == 'Sikap') 
            $kode = 'S' . $request->kode;
        else if($request->aspek == 'Umum') 
            $kode = 'KU' . $request->kode;
        else if($request->aspek == 'Pengetahuan') 
            $kode = 'P' . $request->kode;
        else
            $kode = 'KK' . $request->kode;
        $cpl->update([
            'aspek' => $request->aspek,
            'kurikulum' => $request->kurikulum,
            'kode' => $kode,
            'judul' => $request->judul,
        ]);

        return redirect('/admin/list-cpl')->with('success', 'CPL successfully edited!');
    }

    public function delete($id)
    {
        CPL::where('id', $id)->delete();
        return redirect('/admin/list-cpl');
    }
}
