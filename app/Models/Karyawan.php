<?php

namespace App\Models;

use App\Models\Cuti;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $fillable = [
        'no_induk',
        'nama',
        'alamat',
        'tgl_lahir',
        'tgl_bergabung',
    ];
    public function cuti()
    {
        return $this->hasMany(Cuti::class);
    }
}
