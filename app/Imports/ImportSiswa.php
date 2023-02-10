<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\Kelas\Kelas;
use App\Models\Kelas\Jurusan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportSiswa implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        // dd($rows);
        foreach ($rows as $key => $row) {
            if($key == 0){
                continue;
            }else{
                $jurusan_query = (Jurusan::where('initial', str_replace(' ', '', $row[3])))->count();
                $kelas_querry = (Kelas::where('nama_kelas', str_replace(' ', '', $row[2])))->count();

                $initial = explode('-', $row[2]);
                if (!$kelas_querry && !$jurusan_query) {
                    Jurusan::create([
                        'id' => $row[3].'-'.strtoupper(Str::random(5)),
                        'initial' => $row[3],
                        'nama_jurusan' => $row[3],
                    ]);

                    $jurusan_item = Jurusan::where('initial', $row[3])->first();

                    Kelas::create([
                        'id' => str_replace(' ', '', strtoupper($initial[0] . $initial[1])) . '-' . strtoupper(Str::random(5)),
                        'jurusan_id' => $jurusan_item->id,
                        'nama_kelas' => str_replace(' ', '', strtoupper($row[2])),
                    ]);

                }

                if (!$kelas_querry && $jurusan_query) {
                    $jurusan_item = Jurusan::where('initial', $row[3])->first();
                    $initial = explode('-', $row[2]);
                    Kelas::create([
                        'id' => str_replace(' ', '', strtoupper($initial[0] . $initial[1])) . '-' . strtoupper(Str::random(5)),
                        'jurusan_id' => $jurusan_item->id,
                        'nama_kelas' => str_replace(' ', '', strtoupper($row[2])),
                    ]);
                }

                if (Siswa::where('nis', $row[0])->count()){
                    continue;
                } else {
                    Siswa::create([
                        'nis' => $row[0],
                        'nama_lengkap' => $row[1],
                        'kelas_id' => (Kelas::where('nama_kelas', str_replace(' ', '', strtoupper($row[2])))->first())->id,
                    ]);
                }

            }
        }
    }
    // public function collection(Collection $rows)
    // {
    //     $jurusan = [];
    //     $kelas = [];
    //     $siswa = [];

    //     foreach ($rows as $key => $row) {
    //         if ($key == 0) {
    //             continue;
    //         } else {
    //             $jurusan_query = Jurusan::where('initial', $row[3])->first();
    //             $kelas_query = Kelas::where('nama_kelas', $row[2])->first();
    //             $siswa_query = Siswa::where('nis', $row[0])->first();

    //             if (!$jurusan_query) {
    //                 $jurusan[] = [
    //                     'id' => $row[3].'-'.strtoupper(Str::random(5)),
    //                     'initial' => $row[3],
    //                     'nama_jurusan' => $row[3],
    //                 ];
    //             }
    //             Jurusan::insert($jurusan);

    //             if (!$kelas_query && $jurusan_query) {
    //                 $initial = explode('-', $row[2]);
    //                 $kelas[] = [
    //                     'id' => strtoupper($initial[0] . $initial[1]) . '-' . strtoupper(Str::random(5)),
    //                     'jurusan_id' => $jurusan_query->id,
    //                     'nama_kelas' => $row[2],
    //                 ];
    //             }
    //             Kelas::insert($kelas);

    //             if (!$siswa_query) {
    //                 $kelas_id = $kelas_query ? $kelas_query->id : Kelas::where('nama_kelas', $row[2])->first()->id;

    //                 $siswa[] = [
    //                     'nis' => $row[0],
    //                     'nama_lengkap' => $row[1],
    //                     'kelas_id' => $kelas_id,
    //                 ];
    //             }
    //         }
    //     }
    //     Siswa::insert($siswa);
    // }
}
