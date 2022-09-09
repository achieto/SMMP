<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        $profile = User::where('id', '=', Auth::user()->id)->first();
        return view('admin.user.profile', compact('profile'));
    }

    public function password(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'old_password' => 'required',
            'password' => ['required', 'different:old_password', Rules\Password::defaults()],
            'confirm_password' => 'required|same:password'
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            $request->session()->flash('success', 'Password successfully changed');
            return redirect('/profile');
        } else {
            $request->session()->flash('error', 'Old password does not match');
            return redirect('/profile');
        }
    }

    public function pp(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'img' => 'required'
        ]);

        $img = $request->file('img');
        if ($user->img != 'User-Profile.png') {
            File::delete(public_path('../public/assets/img/pp/' . $user->img));
        }
        $imagePath = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $img->getClientOriginalName());
        $img->move(public_path('../public/assets/img/pp/'), $imagePath);
        $user->fill([
            'img' => $imagePath
        ])->save();

        return redirect('/profile');
    }

    public function name(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z., ]+$/']
        ]);

        $user->fill([
            'name' => $request->name
        ])->save();

        return redirect('/profile');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function create()
    {
        return view('admin.user.add');
    }
    
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

        return redirect('/add-dosen')->with('success', 'User successfully added!');;
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
        return redirect('/list-dosen');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('/list-dosen');
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

        return redirect('/list-dosen')->with('success', 'User successfully edited!');;
    }
}
