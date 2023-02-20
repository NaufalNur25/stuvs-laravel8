<?php

namespace App\Http\Controllers;

use App\Models\User\Guru;
use App\Models\User\Siswa;
use App\Models\Kelas\Kelas;
use Illuminate\Http\Request;
use App\Models\Kelas\Jurusan;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('jurusan', 'siswa', 'guru')->get();
        $jurusan = Jurusan::with('kelas')->get();

        $dashboardControler =  new Controller();
        $jumlahSiswa = $dashboardControler->index()->jumlahSiswa;
        $jumlahGuru = $dashboardControler->index()->jumlahGuru;
        $guruCount = $dashboardControler->index()->guruCount;
        $siswaCount = $dashboardControler->index()->siswaCount;

        return view('kelas-table', compact('kelas', 'jurusan',
        'jumlahSiswa', 'jumlahGuru',
    'guruCount', 'siswaCount'));
    }

    // public function kelas_store(Request $request)
    // {
    //     $item = $request->validate([
    //         'nama_kelas' => ['required'],
    //         'count' => ['required']
    //     ]);

    //     $initial = explode('-', $item['nama_kelas']);
    //     $jurusan = Jurusan::where('initial', $initial[1])->first();

    //     $n = (DB::table('kelas')->where('nama_kelas', 'LIKE', '%' . $item['nama_kelas'] . '%')->get())->count()+1;
    //     for ($i=0; $i < $item['count']; $i++) {
    //         $final_item[] = [
    //                 'id' => strtoupper($initial[0].$initial[1]).'-'.strtoupper(Str::random(5)),
    //                 'nama_kelas' => $item['nama_kelas'].$n++,
    //                 'jurusan_id' => $jurusan->id,
    //                 "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
    //                 "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
    //             ];
    //     }
    //     // dd($final_item);
    //     Kelas::insert($final_item);

    //     return redirect()->route('kelas.detail', $jurusan->id)->with('success','Kelas berhasil ditambahkan.');
    // }

    // public function kelas_edit($id, $nama_kelas)
    // {
    //     $kelas = Kelas::find($id)->where('nama_kelas', $nama_kelas)->first();
    //     return view('form/kelas-form', ['kelas' => $kelas]);
    // }

    public function kelas_update(Request $request, $id)
    {
        // dd($id);
        $item = $request->validate([
            'nama_kelas' => ['required'],
        ]);

        // dd($request['nama_kelas']);

        $kelas = Kelas::find($id)->where('nama_kelas', $item['nama_kelas'])->first();
        $kelas->update([
            'nama_kelas' => $item['nama_kelas']
        ]);
    }

    public function kelas_delete(Kelas $kelas){
        $kelas->delete();
        return back()->with('success','Kelas berhasil dihapus.');
    }

    public function jurusan_delete(Jurusan $jurusan){
        $kelas = Kelas::where('jurusan_id', $jurusan->id)->get();

        foreach ($kelas as $k) {
            $siswa = Siswa::where('kelas_id', $k->id)->get();
            foreach ($siswa as $s) {
                $s->delete();
            }

            $guru = Guru::where('kelas_id', $k->id)->get();
            foreach ($guru as $g) {
                $g->delete();
            }
            $k->delete();
        }

        $jurusan->delete();


        return redirect()->route('kelas')->with('success', 'Berhasil menghapus data Jurusan.');
    }
}
