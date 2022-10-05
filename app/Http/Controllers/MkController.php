<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MK;

class MkController extends Controller
{
    public function create()
    {
        $users = User::where('otoritas', 'Dosen')->get();
        return view('admin.mk.add', compact('users'));
    }

    public function list()
    {
        $mks = MK::all();
        return view('admin.mk.list', compact('mks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => ['required', 'unique:mks', 'alpha_num', 'min:9'],
            'nama' => ['required', 'string','regex:/^[a-zA-Z ]+$/', 'max:255'],
            'deskripsi' => 'required',
            'rumpun' => 'required',
            'prasyarat' => ['nullable', 'string','regex:/^[a-zA-Z ]+$/', 'max:255'],
            'kurikulum' => ['required', 'integer', 'digits:4'],
            'bobot_teori' => ['required', 'integer', 'digits:1'],
            'bobot_praktikum' => ['nullable', 'integer', 'digits:1'],
            'dosen' => 'required',
            'materi' => 'required',
            'pustaka_utama' => ['required', 'string', 'max:255'],
            'pustaka_pendukung' => ['nullable', 'string', 'max:255'],
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
        if ($request->pustaka_pendukung == null) {
            $pp = '-';
        } else {
            $pp = $request->pustaka_pendukung;
        }
        MK::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'rumpun' => $request->rumpun,
            'prasyarat' => $p,
            'kurikulum' => $request->kurikulum,
            'bobot_teori' => $request->bobot_teori,
            'bobot_praktikum' => $bp,
            'dosen' => $request->dosen,
            'materi' => $request->materi,
            'pustaka_utama' => $request->pustaka_utama,
            'pustaka_pendukung' => $pp
        ]);

        return redirect('/admin/list-mk')->with('success', 'MK successfully added!');
    }

    public function edit($id) {
        $mk = MK::findOrFail($id);
        $users = User::where('otoritas', 'Dosen')->get();
        return view('admin.mk.edit', compact('mk', 'users'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'kode' => ['required', 'alpha_num', 'min:9'],
            'nama' => ['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'deskripsi' => 'required',
            'rumpun' => 'required',
            'prasyarat' => ['nullable', 'string','regex:/^[a-zA-Z ]+$/', 'max:255'],
            'kurikulum' => ['required', 'integer', 'digits:4'],
            'bobot_teori' => ['required', 'integer', 'digits:1'],
            'bobot_praktikum' => ['nullable', 'integer', 'digits:1'],
            'dosen' => 'required',
            'materi' => 'required',
            'pustaka_utama' => ['required', 'string', 'max:255'],
            'pustaka_pendukung' => ['nullable', 'string', 'max:255'],
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
        if ($request->pustaka_pendukung == null) {
            $pp = '-';
        } else {
            $pp = $request->pustaka_pendukung;
        }
        $mk = MK::findOrFail($id);
        $mk->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'rumpun' => $request->rumpun,
            'prasyarat' => $p,
            'kurikulum' => $request->kurikulum,
            'bobot_teori' => $request->bobot_teori,
            'bobot_praktikum' => $bp,
            'dosen' => $request->dosen,
            'materi' => $request->materi,
            'pustaka_utama' => $request->pustaka_utama,
            'pustaka_pendukung' => $pp
        ]);

        return redirect('/admin/list-mk')->with('success', 'MK successfully edited!');
    }

    public function delete($id)
    {
        MK::where('id', $id)->delete();
        return redirect('/admin/list-mk');
    }
}
