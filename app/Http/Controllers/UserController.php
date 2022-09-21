<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class UserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z., ]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable', Rules\Password::defaults()],
            'img' => ['nullable'],
            'otoritas' => ['required', 'string', 'max:255'],
        ]);

        $img = $request->file('img');
        if ($img != null) {
            $imagePath = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $img->getClientOriginalName());
            $img->move(public_path('../public/assets/img/pp/'), $imagePath);
        } else {
            $imagePath = 'User-Profile.png';
        }

        $password = $request->password;
        if ($password == null) {
            $password = 'unilajaya';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'img' => $imagePath,
            'otoritas' => $request->otoritas
        ]);


        event(new Registered($user));

        // Auth::login($user);

        return redirect('/admin/list-dosen')->with('success', 'User successfully added!');
    }

    public function list()
    {
        $dosens = User::where('otoritas', 'Dosen')->get();
        return view('admin.user.list', compact('dosens'));
    }

    public function reset($id)
    {
        $reset = User::findorfail($id);
        $password = 'unilajaya';
        $reset->update(['password' => Hash::make($password)]);
        return redirect('/admin/list-dosen')->with('success', 'Password successfully added!');    
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('/admin/list-dosen')->with('success', 'User successfully deleted!');    
    }

    public function edit($id)
    {
        $dosen = User::findorfail($id);
        return view('admin.user.edit', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z., ]+$/'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'img' => ['nullable'],
        ]);

        $dosen = User::findorfail($id);
        $img = $request->file('img');
        if ($img != null) {
            if ($dosen->img != 'User-Profile.png') {
                File::delete(public_path('../public/assets/img/pp' . $dosen->img));
            }
            $imagePath = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $img->getClientOriginalName());
            $img->move(public_path('../public/assets/img/pp'), $imagePath);
            $dosen->update([
                'name' => $request->name,
                'email' => $request->email,
                'img' => $imagePath
            ]);
        } else {
            $dosen->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        return redirect('/admin/list-dosen')->with('success', 'User successfully edited!');;
    }

    public function create_wfile(Request $request) {
        $excel = $request->file('excel');
        $excelPath = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $excel->getClientOriginalName());
        $excel->move(public_path('../public/assets/excel/'), $excelPath);
        Excel::import(new UsersImport, public_path('../public/assets/excel/'.$excelPath));
        return redirect('/admin/list-dosen')->with('success', 'User successfully added!');    
    }
}
