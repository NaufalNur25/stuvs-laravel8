<?php

namespace App\Models\Laporan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriLaporan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_pelanggaran',
        'jenis_pelanggaran',
        'deskripsi_pelanggaran',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    use HasFactory;

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
}
