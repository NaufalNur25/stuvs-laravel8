<?php

namespace App\Models\Laporan;

use App\Models\User\User;
use App\Models\User\Siswa;
use App\Models\Laporan\KategoriLaporan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deskripsi_laporan',
        'tanggal_waktu',
        'user_id',
        'nis',
        'kategori_laporan_id',
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

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    public function kategoriLaporan()
    {
        return $this->belongsTo(KategoriLaporan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
