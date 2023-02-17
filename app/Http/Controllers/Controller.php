<?php

namespace App\Http\Controllers;

use App\Models\User\Guru;
use App\Models\User\User;
use App\Models\User\Siswa;
use App\Models\Kelas\Kelas;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $siswa = Siswa::all();
        $guru = Guru::all();
        $akun = User::all();
        $kelas = Kelas::all();
        $jumlahSiswa = Siswa::groupBy('jenis_kelamin')->selectRaw('jenis_kelamin, count(*) as jumlah')->get();
        $jumlahGuru = Guru::groupBy('jenis_kelamin')->selectRaw('jenis_kelamin, count(*) as jumlah')->get();

        // dd($jumlahSiswa->where('jenis_kelamin', 'Perempuan')->first());
        return view('dashboard', [
            "siswa_count" => $siswa->count(),
            "guru_count" => $guru->count(),
            "akun_count" => $akun->count(),
            "kelas_count" => $kelas->count(),
            "jumlah_siswa_laki_laki" => $jumlahSiswa->where('jenis_kelamin', 'Laki-laki')->first(),
            "jumlah_siswa_perempuan" => $jumlahSiswa->where('jenis_kelamin', 'Perempuan')->first(),
            "jumlah_guru_laki_laki" => $jumlahGuru->where('jenis_kelamin', 'Laki-laki')->first(),
            "jumlah_guru_perempuan" => $jumlahGuru->where('jenis_kelamin', 'Perempuan')->first(),
        ]);
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
