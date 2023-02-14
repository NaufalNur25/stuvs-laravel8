<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas\Kelas;

class Siswa extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nis',
        'nama_lengkap',
        'jenis_kelamin',
        'kode_siswa',
        'kelas_id',
        'nilai',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    use HasFactory;

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function User()
    {
        return $this->hasOne(User::class, 'kode_siswa', 'kode_siswa');
    }
}
