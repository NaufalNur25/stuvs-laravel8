<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriLaporan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_kategori',
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

    public function deskripsiLaporans()
    {
        return $this->hasMany(DeskripsiLaporan::class, 'kategori_pelanggaran_id');
    }
}
