<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Crypt;

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

        return redirect('/admin/list-user')->with('success', 'User successfully added!');
    }

    public function list()
    {
        $users = User::where('otoritas', '!=', 'Admin')->orderBy('created_at', 'asc')->get();
        return view('admin.user.list', compact('users'));
    }

    public function reset($id)
    {
        $ids = Crypt::decrypt($id);
        $reset = User::findOrFail($ids);
        $password = 'unilajaya';
        $reset->update(['password' => Hash::make($password)]);
        return redirect('/admin/list-user')->with('success', 'Password successfully reset!');    
    }

    public function delete($id)
    {
        $ids = Crypt::decrypt($id);
        User::where('id', $ids)->delete();
        return redirect('/admin/list-user')->with('success', 'User successfully deleted!');    
    }

    public function edit($id)
    {
        $ids = Crypt::decrypt($id);
        $user = User::findOrFail($ids);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z., ]+$/'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'img' => ['nullable'],
            'otoritas' => ['required', 'string', 'max:255'],
        ]);

        $ids = Crypt::decrypt($id);
        $user = User::findOrFail($ids);
        $img = $request->file('img');
        if ($img != null) {
            if ($user->img != 'User-Profile.png') {
                File::delete(public_path('../public/assets/img/pp' . $user->img));
            }
            $imagePath = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $img->getClientOriginalName());
            $img->move(public_path('../public/assets/img/pp'), $imagePath);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'img' => $imagePath,
                'otoritas' => $request->otoritas

            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'otoritas' => $request->otoritas
            ]);
        }

        return redirect('/admin/list-user')->with('success', 'User successfully edited!');;
    }

    public function create_wfile(Request $request) {
        try {
            $excel = $request->file('excel');
            $excelPath = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $excel->getClientOriginalName());
            $excel->move(public_path('../public/assets/excel/'), $excelPath);
            Excel::import(new UsersImport, public_path('../public/assets/excel/' . $excelPath));
            return redirect('/admin/list-user')->with('success', 'User successfully added!');    
        } catch (\Exception $e) {
            return redirect('/admin/add-user')->with('error', "Terjadi kesalahan, silahkan periksa kembali data dalam excel anda!");
        }
    }
}
