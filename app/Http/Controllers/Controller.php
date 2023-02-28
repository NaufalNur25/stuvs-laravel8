<?php

namespace App\Http\Controllers;

use App\Models\User\Guru;
use App\Models\User\User;
use App\Models\User\Siswa;
use App\Models\Kelas\Kelas;
use Illuminate\Http\Request;
use App\Models\Laporan\Laporan;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        if(Gate::allows('administrator')){
            $siswaCount = Siswa::count();
            $guruCount = Guru::count();
            $akunCount = User::count();
            $kelasCount = Kelas::count();
            $laporanCount = Laporan::count();
            $jumlahSiswa = Siswa::groupBy('jenis_kelamin')->selectRaw('jenis_kelamin, count(*) as jumlah')->get();
            $jumlahGuru = Guru::groupBy('jenis_kelamin')->selectRaw('jenis_kelamin, count(*) as jumlah')->get();

            // dd($jumlahSiswa->where('jenis_kelamin', 'Perempuan')->first());
            return view('dashboard', compact(
                'siswaCount', 'guruCount', 'akunCount', 'kelasCount',
                'jumlahSiswa', 'jumlahGuru', 'laporanCount'
            ));
        }

        if(Gate::allows('petugas')){
            $kelasWalikelas = Guru::with('kelas', 'kelas.siswa')
            ->where('kelas_id', optional(auth()->user()->guru)->kelas_id)
            ->first();

            if($kelasWalikelas){
                $siswa = @$kelasWalikelas->kelas->siswa;
                $siswaCount = optional($siswa)->count();

                $siswaLaporan = Siswa::with('laporan')
                    ->where('kelas_id', $kelasWalikelas->kelas_id)
                    ->has('laporan')
                    ->get();

                $now = now()->format('Y-m-d');
                $siswaPelanggaran = Siswa::with(['laporan' => function($query) use ($now) {
                        $query->whereDate('tanggal_waktu', $now);
                    }])->where('kelas_id', $kelasWalikelas->kelas_id)
                    ->has('laporan')
                    ->get();

                $laporanCount = $siswaPelanggaran->count();
                $jumlahSiswa = Siswa::groupBy('jenis_kelamin')
                ->where('kelas_id', $kelasWalikelas->kelas_id)
                ->selectRaw('jenis_kelamin, count(*) as jumlah')
                ->get();
            }

            return view('dashboard', compact('siswaCount', 'laporanCount', 'jumlahSiswa', 'kelasWalikelas', 'siswaPelanggaran'));
        }

    }

    public function getUppercase($item): String
    {
        $items = explode(" ", $item);
        $item_result = array();
        foreach ($items as $count => $item) {
            // $item_result += array($count, substr($item, 0, 1));
            $item_result += array($count => substr(strtoupper($item), 0, 1));
        }
        return implode($item_result);
    }

    public function strUppercase($item): String
    {
        $items = explode(" ", $item);
        $item_result = array();
        foreach ($items as $count => $item) {
            // $item_result += array($count, substr($item, 0, 1));
            $item_result += array($count => ucfirst($item));
        }
        // dd($item_result);
        return implode(" ", $item_result);
    }

    public function get_jurusan(Request $request){
        $jurusan_id = $request->jurusan_id;
        $kelas = Kelas::where('jurusan_id', $jurusan_id)->get();

        $output = '<option selected disabled>...</option>';
        foreach ($kelas as $item) {
            $output .= "<option value='$item->id'>$item->nama_kelas</option>";
        }

        return response($output);
    }

    public function get_namalengkap(Request $request){
        $kelas_id = $request->kelas_id;
        $siswa = Siswa::where('kelas_id', $kelas_id)->get();

        $output = '<option selected disabled>...</option>';
        foreach ($siswa as $item) {
            $output .= "<option value='$item->nis'>$item->nama_lengkap</option>";
        }

        return response($output);
    }

}
