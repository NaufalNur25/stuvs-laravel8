<?php

namespace App\Imports;
use App\Models\GuruImport;
use App\Models\Guru;

use Maatwebsite\Excel\Concerns\ToModel;

class ImportGuru implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ImportGuru([
            'nip' => $row[1],
            'nama_lengkap' => $row[2],
            'jenis_kelamin' => $row[3],
            'kelas_id' => $row[4],
            'kode_user' => $row[5]



        ]);
    }
}
