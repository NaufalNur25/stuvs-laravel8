<?php

namespace App\Http\Controllers;

use App\Models\User\Guru;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Models\Kelas\Jurusan;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signin()
    {
        return view('auth.auth-signin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'email' => 'password atau email salah.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function signup()
    {
        return view('auth.auth-signup');
    }

    public function register(Request $request)
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


    public function show(){
        $currentUser = auth()->user();
        $result = User::whereNotIn('id', [$currentUser->id])->get();

        return view('views-table.user-table', [
            'user' => $result
        ]);
    }

    public function update(Request $request, $user){
        $id = decrypt($user);
        $user = User::find($id);

        $validateData = $request->validate([
            'username' => ['required', 'string', 'min:5', 'max:25', Rule::unique('users', 'username')->ignore($user->id)],
            'role' => ['required'],
        ]);

        // dd($user);

        if($validateData['username'] === $user->username) {
            $user->update([
                'role' => $validateData['role'],
            ]);
        } else {
            $user->update([
                'username' => $validateData['username'],
                'role' => $validateData['role'],
            ]);
        }

        return redirect()->route('user')->with('success', 'Berhasil mengubah user ' . $user->username);
    }


    public function edit() {
        // $user = User::where('id', Auth::user()->id)->first();
        $user = User::where('id', Auth::user()->id)->with('siswa')->first();
        $jurusan = Jurusan::all();
        return view('form.profile-form', compact('user', 'jurusan'));
    }
}
