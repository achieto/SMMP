<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function list()
    {
        $kurikulums = Kurikulum::orderBy('tahun', 'desc')->get();
        return view('admin.kurikulum.list', compact('kurikulums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => ['required', 'integer', 'digits:4'],
        ]);

        Kurikulum::create([
            'tahun' => $request->tahun,

        ]);

        return redirect('/admin/list-kurikulum')->with('success', 'Kurikulum successfully added!');
    }

    public function edit($id)
    {
        $kurikulums = Kurikulum::all();
        $kurikulum = Kurikulum::findorFail($id);
        return view('admin.kurikulum.edit', compact('kurikulums', 'kurikulum'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => ['required', 'integer', 'digits:4'],
        ]);
        $kurikulum = Kurikulum::findorFail($id);
        $kurikulum->update([
            'tahun' => $request->tahun,
        ]);

        return redirect('/admin/list-kurikulum')->with('success', 'Kurikulum successfully edited!');
    }

    public function delete($id)
    {
        try {
            Kurikulum::where('id', $id)->delete();
            return redirect('/admin/list-kurikulum')->with('success', 'Kurikulum successfully deleted!');;
        } catch (\Illuminate\Database\QueryException $e) {
            $kur = Kurikulum::where('id', $id)->get();
            return redirect('/admin/list-kurikulum')->with('error', 'Terjadi kesalahan, tahun kurikulum ' . $kur[0]['tahun'] . ' masih memiliki CPL/MK');
        }
    }
}
