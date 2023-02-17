<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeskripsiLaporan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kategori_pelanggaran_id',
        'deskripsi_laporan',
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

    public function kategoriLaporan()
    {
        return $this->belongsTo(KategoriLaporan::class, 'kategori_pelanggaran_id');
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'deskripsi_laporan_id');
    }
}
