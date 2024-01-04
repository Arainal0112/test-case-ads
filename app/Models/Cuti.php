<?php

namespace App\Models;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuti extends Model
{
    use HasFactory;
    protected $table = 'cuti';
    protected $fillable =[
        'tgl_cuti',
        'lama_cuti',
        'keterangan'
    ];
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
