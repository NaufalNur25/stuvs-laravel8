<?php

namespace App\Models\Kelas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User\Siswa;
use App\Models\User\Guru;
use App\Models\Kelas\Jurusan;

class Kelas extends Model
{

    // public $incrementing = false;
    public $keyType = 'string';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nama_kelas',
        'jurusan_id',
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

    public function Jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    public function Siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
