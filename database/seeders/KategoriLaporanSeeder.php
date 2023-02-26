<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laporan\KategoriLaporan;

class KategoriLaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriLaporan::create([
            'nama_pelanggaran' => 'Keterlambatan',
            'jenis_pelanggaran' => 'Ringan',
            'deskripsi_pelanggaran' => 'Siswa dikatakan terlambat jika datang ke sekolah lewat dari pukul 7 Pagi.'
        ]);
    }
}
