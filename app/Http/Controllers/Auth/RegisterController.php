<?php

namespace App\Http\Controllers\Auth;

use App\Models\User\Guru;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class RegisterController
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerSession(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => ['required', 'min:10', 'max:20'],
            'username' => ['required', 'string', 'min:5', 'max:25', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:5', 'max:225']
        ]);

        // Generate unique kode user
        $kdUser = 'GURU-'.substr(Hash::make($validatedData['username']), 0, 15);

        // Get guru data by nip
        $guru = Guru::where('nip', $request->nip)->first();
        if (!$guru) {
            return back()->withErrors([
                'nip' => 'NIP guru tidak ditemukan.'
            ]);
        }

        // Check if guru already has an account
        if ($guru->kode_user) {
            return back()->withErrors([
                'nip' => 'Guru sudah memiliki akun.'
            ]);
        }

        // Hash password and add kode user to the validated data
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData += ['kode_user' => $kdUser];

        // Create user and update guru data
        User::create($validatedData);
        $guru->update(['kode_user' => $kdUser]);

        // Authenticate user and redirect to intended URL

        Auth::attempt($request->only('email', 'password'));
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
