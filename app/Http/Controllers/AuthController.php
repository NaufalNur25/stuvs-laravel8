<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use Illuminate\Http\Request;
use App\Models\Kelas\Jurusan;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

    class AuthController extends Controller
{
    public function show(){
        $currentUser = auth()->user();
        $result = User::whereNotIn('id', [$currentUser->id])->get();


        return view('views-table.user-table', [
            'user' => $result,
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
