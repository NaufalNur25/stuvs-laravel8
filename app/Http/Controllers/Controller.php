<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $siswa = Siswa::all();
        $jumlahSiswa = Siswa::groupBy('jenis_kelamin')->selectRaw('jenis_kelamin, count(*) as jumlah')->get();
        $akun = User::all();

        // dd($jumlahSiswa->where('jenis_kelamin', 'Perempuan')->first());
        return view('dashboard', [
            "siswa_count" => $siswa->count(),
            "akun_count" => $akun->count(),
            "jumlah_siswa_laki_laki" => $jumlahSiswa->where('jenis_kelamin', 'Laki-laki')->first(),
            "jumlah_siswa_perempuan" => $jumlahSiswa->where('jenis_kelamin', 'Perempuan')->first(),
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
}
