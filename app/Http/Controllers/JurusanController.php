<?php

namespace App\Http\Controllers;

use App\Models\Kelas\Kelas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Kelas\Jurusan;

class JurusanController extends Controller
{


    public function jurusan_store(Request $request)
    {
        $item = $request->validate([
            'nama_jurusan' => ['required']
        ]);

        $kode_jurusan = $this->getUppercase($request['nama_jurusan']).'-'.strtoupper(Str::random(5));
        $item += array('id' => $kode_jurusan);
        $item += array('initial' => $this->getUppercase($request['nama_jurusan']));

        $item['nama_jurusan'] = $this->strUppercase($item['nama_jurusan']);

        Jurusan::create($item);
        return back()->with('success', 'Jurusan baru berhasil dibuat.');
    }

    public function jurusan_delete($id)
    {
        // (Jurusan::find($id)->kelas)->delete();
        Kelas::where('jurusan_id', $id)->delete();

        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        return redirect('/jurusan')->with('success','Jurusan berhasil dihapus.');
    }
}
