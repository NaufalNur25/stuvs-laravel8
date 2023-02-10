<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportSiswa;

class SiswaController extends Controller
{
    public function importView()
    {
        return view('import.import_siswa');
    }

    public function import(Request $request){
        Excel::import(new ImportSiswa, $request->file('file'));
        return redirect()->back();
    }

    public function index($item = null){
        $result = Siswa::with(['kelas', 'kelas.jurusan']);
        // if ($item) {
        //     $result->whereHas('kelas', function ($query) use ($item) {
        //         $query->where('nama_kelas', $item);
        //     });
        // }
        // $result = $result->get();

        // return view('siswa-table', [
        //     'siswa' => $result,
        //     'kelas' => !(($result->first())->kelas->nama_kelas)->count() ? $result : ($result->first())->kelas->nama_kelas,
        // ]);
        if ($item) {
            $result->whereHas('kelas', function ($query) use ($item) {
                $query->where('nama_kelas', $item);
            });
        }
        $result = $result->get();

        $kelas = '';
        if ($result->isNotEmpty()) {
            $kelas = ($result->first())->kelas->nama_kelas;
        }

        return view('siswa-table', [
            'siswa' => $result,
            'kelas' => $kelas,
        ]);
    }

    public function siswa_create(){
        return view('form.siswa-form');
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
