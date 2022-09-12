<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
    {
        $profile = User::where('id', '=', Auth::user()->id)->first();
        return view('profile', compact('profile'));
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
}