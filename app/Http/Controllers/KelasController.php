<?php

namespace App\Http\Controllers;

use App\Models\User\Guru;
use App\Models\User\Siswa;
use App\Models\Kelas\Kelas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Kelas\Jurusan;

class KelasController extends Controller
{
    protected static $dashboardController;

    public function __construct()
    {
        self::$dashboardController = new Controller();
    }

    public function index()
    {
        $kelas = Kelas::with('jurusan', 'siswa', 'guru')->get();
        $jurusan = Jurusan::with('kelas')->get();


        $jumlahSiswa = self::$dashboardController->index()->jumlahSiswa;
        $jumlahGuru = self::$dashboardController->index()->jumlahGuru;
        $guruCount = self::$dashboardController->index()->guruCount;
        $siswaCount = self::$dashboardController->index()->siswaCount;

        return view('kelas-table', compact('kelas', 'jurusan',
        'jumlahSiswa', 'jumlahGuru',
    'guruCount', 'siswaCount'));
    }

    public function kelas_update(Request $request, $id)
    {
        $item = $request->validate([
            'nama_kelas' => ['required'],
        ]);

        $kelas = Kelas::find($id)->where('nama_kelas', $item['nama_kelas'])->first();
        $kelas->update([
            'nama_kelas' => $item['nama_kelas']
        ]);

    }

    public function kelas_delete(Kelas $kelas){
    $siswa = siswa::where('kelas_id', $kelas->id)->get();
        foreach ($siswa as  $s) {
            $s->delete();
        }
        $kelas->delete();
        return back()->with('success','Kelas berhasil dihapus.');
    }

    public function jurusan_create(){
        return view('form.jurusan-form',[
            'jurusan' => Jurusan::all(),
        ]);
    }

    public function kelas_create(){
        return view('form.kelas-form',[
            'jurusan' => Jurusan::all(),
        ]);
    }

    public function jurusan_store(Request $request){
        $item = $request->validate([
            'nama_jurusan' => ['required'],
        ]);

        $kode_jurusan = self::$dashboardController->getUppercase($request['nama_jurusan']) . '-' . strtoupper(Str::random(5));
        $item = array_merge($item, [
            'id' => $kode_jurusan,
            'nama_jurusan' => self::$dashboardController->strUppercase($item['nama_jurusan']),
        ]);

        Jurusan::create($item);
        return redirect()->route('kelas')->with('success', 'Berhasil menambahkan Jurusan.');
    }

    public function kelas_store(Request $request){
        $item = $request->validate([
            'jurusan_id' => ['required'],
            'nama_kelas' => ['required', 'unique:kelas'],
        ]);

        $item += array("id" => $request['nama_kelas'].'-'.strtoupper(Str::random(5)));
        Kelas::create($item);
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

        return back()->with('success', 'Berhasil menghapus data Jurusan.');
    }
}
