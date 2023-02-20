<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas\Kelas;
use App\Models\User\User;

class Siswa extends Model
{
    public $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nis',
        'nama_lengkap',
        'jenis_kelamin',
        'kode_user',
        'kelas_id',
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

    public function User()
    {
        return $this->hasOne(User::class, 'kode_siswa', 'kode_siswa');
    }

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class);
    }


    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'nis', 'nis');
    }
}
