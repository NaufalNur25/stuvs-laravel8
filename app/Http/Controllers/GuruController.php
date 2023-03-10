<?php

namespace App\Http\Controllers;

use App\Models\User\Guru;
use App\Imports\ImportGuru;
use Illuminate\Http\Request;
use App\Models\Kelas\Jurusan;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    public function index()
    {
        $result = Guru::with(['kelas'])->get();
        return view('views-table.guru-table', [
            'guru' => $result
        ]);
    }


    public function create()
    {
        $jurusan = Jurusan::all();
        return view('form.guru-form',compact('jurusan'));
    }


    public function store(Request $request)
    {

        $commonRules = [
            'nip' => ['required', 'min:15', 'max:25', 'unique:App\Models\User\Guru,nip'],
            'nama_lengkap' => ['required', 'max:225'],
            'jenis_kelamin' => ['required'],
        ];

        $withKelasRules = [
            'kelas_id' => ['required'],
        ];

        $validasiData = $request->validate($request->has('kelas_id') ? array_merge($commonRules, $withKelasRules) : $commonRules);
        $validasiData['nama_lengkap'] = strtoupper($validasiData['nama_lengkap']);

        // dd($validasiData);

        $guru = Guru::create($validasiData);
        return redirect()->route('guru')->with('success', 'Berhasil membuat data Guru dengan NIP: '.$guru->nip);
    }


    public function edit($id)
    {
        $id = decrypt($id);
        $guru = Guru::find($id);
        $jurusan = Jurusan::all();

        return view('form.guru-form', compact('guru', 'jurusan'));
    }


    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $guru = Guru::find($id);

        $validatedData = $request->validate([
            'nip' => ['required', 'min:12', 'max:20', Rule::unique('gurus')->ignore($guru->id)],
            'nama_lengkap' => ['required', 'max:225'],
            'jenis_kelamin' => ['required'],
            'kelas_id' => $request->has('kelas_id') ? ['required'] : [],
        ]);

        $validatedData['nama_lengkap'] = strtoupper($validatedData['nama_lengkap']);
        $guru->update($validatedData);
        return redirect()->route('guru')->with('success', 'Berhasil mengubah data Guru dengan NIP: '. $guru->nip);

    }

    public function importView()
    {
        return view('import.import_guru');
    }


    public function delete($id)
    {
        Guru::destroy($id);
        return redirect()->route('guru')->with('success', 'Berhasil menghapus data Guru.');
    }

    public function import(Request $request){
        Excel::import(new ImportGuru, $request->file('file'));
        return redirect()->route('guru')->with('success', 'Berhasil import semua data guru.');
    }
}
