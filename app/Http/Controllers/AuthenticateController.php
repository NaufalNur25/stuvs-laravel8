<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use App\Models\User\Siswa;
use Illuminate\Http\Request;
use App\Models\Kelas\Jurusan;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    public function login_index()
    {
        return view('auth.auth-signin');
    }

    public function register_index()
    {
        return view('auth.auth-signup');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'password atau email salah.'
        ]);

        // dd($request->email);

        // dd('berhasil login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => ['required', 'min:8', 'max:10'],
            'username' => ['required', 'string', 'min:5', 'max:25', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:5', 'max:225']
        ]);

        $kdUser = 'SISWA-'.substr(Hash::make($validatedData['username']), 0, 15);
        $siswa = DB::table('siswas')->where('nis', $request->nis)->get();
        // dd(count($siswa) == 0);
        if(count($siswa) == 0){
            return back()->withErrors([
                'nis' => 'NIS Siswa tidak ditemukan.'
            ]);
        }
        if(count($siswa->where('kode_siswa')) != 0){
            return back()->withErrors([
                'nis' => 'Siswa sudah memiliki akun.'
            ]);
        }


        // $validatedData['password'] = Hash::make($validatedData['password']);
        // array_push($validatedData, $item);
        // $validatedData += array('kode_siswa' => $kdSiswa);
        // dd($validatedData);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData += array('kode_user' => $kdUser);
        User::create($validatedData);

        Siswa::where('nis', $siswa[0]->nis)->first()
        ->update([
            'kode_user' => $kdUser
        ]);

        return redirect('/login')->with('success', 'Regisration successfull! Please login');
        // dd('Register Berhasil');
    }

    public function show(){
        $currentUser = auth()->user();
        $result = User::whereNotIn('id', [$currentUser->id])->get();

        return view('user-table', [
            'user' => $result
        ]);
    }

    public function update(Request $request, $user){
        $id = decrypt($user);
        $user = User::find($id);

        $validateData = $request->validate([
            'username' => ['required', 'string', 'min:5', 'max:25', Rule::unique('users')->ignore($user->id)],
            'role' => ['required'],
        ]);

        $user->update([
            'username' => $validateData['username'],
        ]);

        return redirect()->route('user')->with('success', 'Berhasil mengubah user ' . $request['username']);
    }

    public function edit() {
        // $user = User::where('id', Auth::user()->id)->first();
        $user = User::where('id', Auth::user()->id)->with('siswa')->first();
        $jurusan = Jurusan::all();
        return view('form.profile-form', compact('user', 'jurusan'));
    }
}
