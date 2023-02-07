<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index(){
        // $result = DB::select('SELECT * FROM siswas');
        $result = DB::table('siswas')->paginate(50);

        return view('siswa-table', [
            'siswa' => $result
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nis' => ['required', 'min:8', 'max:10'],
            'nama_lengkap' => ['required', 'max:225'],
            'jenis_kelamin' => ['required'],
            'kelas' => ['required'],
            'jurusan' => ['required'],
        ]);

        Siswa::create($validatedData);
    }
}
