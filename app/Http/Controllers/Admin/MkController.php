<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MK;
use App\Models\Kurikulum;
use Illuminate\Support\Facades\Crypt;

class MkController extends Controller
{
    public function create()
    {
        $mks = MK::all();
        $kurikulums = Kurikulum::all();
        return view('admin.mk.add', compact('mks', 'kurikulums'));
    }

    public function list()
    {
        $mks = MK::orderBy('kurikulum', 'desc')->get();
        return view('admin.mk.list', compact('mks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => ['required', 'alpha_num', 'min:9'],
            'nama' => ['required', 'string','regex:/^[a-zA-Z ]+$/', 'max:255'],
            'rumpun' => 'required',
            'prasyarat' => ['nullable', 'string','regex:/^[a-zA-Z ]+$/', 'max:255'],
            'kurikulum' => ['required', 'integer', 'digits:4'],
            'deskripsi' => 'required',
            'bobot_teori' => ['required', 'integer', 'digits:1'],
            'bobot_praktikum' => ['nullable', 'integer', 'digits:1'],
        ]);
        if ($request->prasyarat == null) {
            $p = 'Tidak ada';
        } else {
            $p = $request->prasyarat;
        }
        if ($request->bobot_praktikum == null) {
            $bp = '0';
        } else {
            $bp = $request->bobot_praktikum;
        }
        MK::create([
            'kode' => strtoupper($request->kode),
            'nama' => $request->nama,
            'rumpun' => $request->rumpun,
            'prasyarat' => $p,
            'kurikulum' => $request->kurikulum,
            'deskripsi' => $request->deskripsi,
            'bobot_teori' => $request->bobot_teori,
            'bobot_praktikum' => $bp,
        ]);

        return redirect('/admin/list-mk')->with('success', 'MK successfully added!');
    }

    public function edit($id) {
        $ids = Crypt::decrypt($id);
        $mk = MK::findOrFail($ids);
        $mks = MK::all();
        $kurikulums = Kurikulum::all();
        return view('admin.mk.edit', compact('mk', 'mks', 'kurikulums'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'kode' => ['required', 'alpha_num', 'min:9'],
            'nama' => ['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'rumpun' => 'required',
            'prasyarat' => ['nullable', 'string','regex:/^[a-zA-Z ]+$/', 'max:255'],
            'kurikulum' => ['required', 'integer', 'digits:4'],
            'deskripsi' => 'required',
            'bobot_teori' => ['required', 'integer', 'digits:1'],
            'bobot_praktikum' => ['nullable', 'integer', 'digits:1'],
        ]);
        if ($request->prasyarat == null) {
            $p = 'Tidak ada';
        } else {
            $p = $request->prasyarat;
        }
        if ($request->bobot_praktikum == null) {
            $bp = '0';
        } else {
            $bp = $request->bobot_praktikum;
        }
        $ids = Crypt::decrypt($id);
        $mk = MK::findOrFail($ids);
        $mk->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'rumpun' => $request->rumpun,
            'prasyarat' => $p,
            'kurikulum' => $request->kurikulum,
            'deskripsi' => $request->deskripsi,
            'bobot_teori' => $request->bobot_teori,
            'bobot_praktikum' => $bp
        ]);

        return redirect('/admin/list-mk')->with('success', 'MK successfully edited!');
    }

    public function delete($id)
    {
        $ids = Crypt::decrypt($id);
        MK::where('id', $ids)->delete();
        return redirect('/admin/list-mk');
    }
}
