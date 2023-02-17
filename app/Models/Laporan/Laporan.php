<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nis',
        'deskripsi_laporan_id',
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

    public function deskripsiLaporan()
    {
        return $this->belongsTo(DeskripsiLaporan::class, 'deskripsi_laporan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
