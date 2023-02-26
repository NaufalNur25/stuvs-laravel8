<?php

namespace App\Http\Controllers;

use App\Models\User\Guru;
use App\Models\User\User;
use App\Models\User\Siswa;
use App\Models\Kelas\Kelas;
use Illuminate\Http\Request;
use App\Models\Laporan\Laporan;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
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
        $id_jurusan = $request->id_jurusan;
        $kelas = Kelas::where('jurusan_id', $id_jurusan)->get();

        $siswa = '';

        foreach ($kelas as $item) {
            echo "<option value='$item->id'>$item->nama_kelas</option>";
        }
    }
}
