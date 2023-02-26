<?php

namespace App\Http\Controllers;

use App\Models\User\Siswa;
use Illuminate\Support\Str;
use App\Imports\ImportSiswa;
use Illuminate\Http\Request;
use App\Models\Kelas\Jurusan;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index($item = null)
    {
        $siswa = Siswa::with(['kelas', 'kelas.jurusan']);

        if ($item) {
            $siswa->whereHas('kelas', function ($query) use ($item) {
                $query->where('nama_kelas', $item);
            });
        }

        $siswa = $siswa->get();
        $kelas = $siswa->isNotEmpty() ? $siswa->first()->kelas->nama_kelas : '';

        return view('views-table.siswa-table', compact('siswa', 'kelas'));
    }

    public function create(){
        $jurusan = Jurusan::all();
        return view('form.siswa-form',compact('jurusan'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama_lengkap' => ['required', 'max:225'],
            'jenis_kelamin' => ['required'],
            'kelas_id' => ['required'],
        ]);

        if($request['auto_generate']){
            // Mendapatkan tahun ajaran saat ini
            $tahun_ajaran = Carbon::now()->year;
            // Mendapatkan NIS terakhir
            $nis_terakhir = Siswa::where('nis', 'LIKE', $tahun_ajaran.'%')->latest('id')->value('nis');
            // Menentukan NIS baru
            if ($nis_terakhir) {
                $no_urut = Str::substr($nis_terakhir, -4);
                $no_urut = (int) $no_urut + 1;
                $no_urut = str_pad($no_urut, 6, '0', STR_PAD_LEFT);
                $nis_baru = $tahun_ajaran . $no_urut;
            } else {
                $nis_baru = $tahun_ajaran . '000001';
            }

            $validatedData += array('nis' => $nis_baru);
        }else {
            $validatedData = $request->validate([
                'nis' => ['required', 'min:8', 'max:10', 'unique:App\Models\User\Siswa,nis'],
                'nama_lengkap' => ['required', 'max:225'],
                'jenis_kelamin' => ['required'],
                'kelas_id' => ['required'],
            ]);
        }

        $validatedData['nama_lengkap'] = strtoupper($validatedData['nama_lengkap']);

        Siswa::create($validatedData);
        return redirect()->route('siswa')->with('success', 'Berhasil menambahkan siswa baru dengan NIS: '. $validatedData['nis']);
    }

    public function edit($id){
        $id = decrypt($id);
        $siswa = Siswa::find($id);
        $jurusan = Jurusan::all();
        return view('form.siswa-form', compact('siswa','jurusan'));
    }

    public function update(Request $request, $id){
        $id = decrypt($id);
        $siswa = Siswa::find($id);

        $validatedData = $request->validate([
            'nis' => ['required', 'min:8', 'max:10', Rule::unique('siswas')->ignore($siswa->id)],
            'nama_lengkap' => ['required', 'max:225'],
            'jenis_kelamin' => ['required'],
            'kelas_id' => ['required'],
        ]);

        $validatedData['nama_lengkap'] = strtoupper($validatedData['nama_lengkap']);
        $siswa->update($validatedData);
        return redirect()->route('siswa')->with('success', 'Berhasil mengubah data siswa dengan NIS: '. $siswa->nis);
    }

    public function delete($id){
        Siswa::destroy($id);
        return redirect()->route('siswa')->with('success', 'Berhasil Menghapus data siswa.');
    }

    public function importView()
    {
        return view('import.import_siswa');
    }

    public function import(Request $request){
        foreach ($request->file('file') as $item) {
            Excel::import(new ImportSiswa, $item);
        }
        return redirect()->route('siswa')->with('success', 'Berhasil import semua data siswa.');
    }


}
