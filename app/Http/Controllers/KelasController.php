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
            'jurusan' => Jurusan::all(),
            'kelas' => Kelas::all(),
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
        $kelas = Jurusan::find($id)->kelas;
        dd($kelas);

        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        // return redirect('/home')->with('success','Task deleted successfully');
    }

    public function kelas_detail($id){
        $kelas = Jurusan::find($id)->kelas;

        return view('kelas-detail', ['kelas' => $kelas]);
        // return view('kelas-detail');
    }

    public function kelas_store(Request $request)
    {
        $item = $request->validate([
            'nama_kelas' => ['required'],
            'count' => ['required']
        ]);
        // dd($item);

        $initial = explode('-', $item['nama_kelas']);
        $jurusan = Jurusan::where('initial', $initial[1])->first();

        $n = (DB::table('kelas')->where('nama_kelas', 'LIKE', '%' . $item['nama_kelas'] . '%')->get())->count()+1;
        for ($i=0; $i < $item['count']; $i++) {
            $final_item[] = [
                    'nama_kelas' => $item['nama_kelas'].$n++,
                    'jurusan_id' => $jurusan->id,
                    "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                    "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
                ];
        }
        // dd($final_item);
        Kelas::insert($final_item);

    }


}
