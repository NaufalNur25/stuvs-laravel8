<?php

namespace App\Http\Controllers\Auth;

use App\Models\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nip' => ['required', 'min:10', 'max:20'],
            'username' => ['required', 'string', 'min:5', 'max:25', 'unique:users'],
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // // Generate unique kode user
        // $kdUser = 'GURU-'.substr(Hash::make($data['username']), 0, 15);

        // // Get guru data by nip
        // $guru = Guru::where('nip', $data['nip'])->first();
        // if (!$guru) {
        //     return back()->withErrors([
        //         'nip' => 'NIP guru tidak ditemukan.'
        //     ]);
        // }

        // // Check if guru already has an account
        // if ($guru->kode_user) {
        //     return back()->withErrors([
        //         'nip' => 'Guru sudah memiliki akun.'
        //     ]);
        // }

        // $guru->update(['kode_user' => $kdUser]);
        return User::create([
            // 'kode_user' => $kdUser,
            // 'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
