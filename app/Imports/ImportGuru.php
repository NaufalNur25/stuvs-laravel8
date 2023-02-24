<?php

namespace App\Imports;

use App\Models\User\Guru;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportGuru implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if($key == 0){
                continue;
            } else {
                if (empty($row[0]) || empty($row[1]) || empty($row[2])) {
                    continue;
                }
                Guru::updateOrCreate(
                    ['nip' => $row[1]],
                    [
                        'nama_lengkap' => strtoupper($row[0]),
                        'jenis_kelamin' => $row[2]
                    ]
                );
            }
        }
    }
}
