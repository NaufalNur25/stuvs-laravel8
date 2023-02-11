<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Kelas\Kelas;
use App\Models\Kelas\Jurusan;

class KelasController extends Controller
{
    public function jurusan_index()
    {
        return view('kelas', [
            'jurusan' => Jurusan::with('kelas', 'kelas.siswa')->get(),
        ]);
    }

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

    public function kelas_detail($id){
        $kelas = (Kelas::where('jurusan_id', $id))->orderBy('nama_kelas', 'asc')->get();

        return view('kelas-detail', ['kelas' => $kelas]);
        // return view('kelas-detail');
    }

    public function kelas_store(Request $request)
    {
        $item = $request->validate([
            'nama_kelas' => ['required'],
            'count' => ['required']
        ]);

        $initial = explode('-', $item['nama_kelas']);
        $jurusan = Jurusan::where('initial', $initial[1])->first();

        $n = (DB::table('kelas')->where('nama_kelas', 'LIKE', '%' . $item['nama_kelas'] . '%')->get())->count()+1;
        for ($i=0; $i < $item['count']; $i++) {
            $final_item[] = [
                    'id' => strtoupper($initial[0].$initial[1]).'-'.strtoupper(Str::random(5)),
                    'nama_kelas' => $item['nama_kelas'].$n++,
                    'jurusan_id' => $jurusan->id,
                    "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                    "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
                ];
        }
        // dd($final_item);
        Kelas::insert($final_item);

        return redirect()->route('kelas.detail', $jurusan->id)->with('success','Kelas berhasil ditambahkan.');
    }

    public function kelas_edit($id, $nama_kelas)
    {
        // $item = array(
        //     [
        //         'id'=>$id,
        //         '$nama_kelas'=>$nama_kelas
        //     ]
        // );
        // dd($item);

        $kelas = Kelas::find($id)->where('nama_kelas', $nama_kelas)->first();
        return view('form/kelas-form', ['kelas' => $kelas]);
    }

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
}
