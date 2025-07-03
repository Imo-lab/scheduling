<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $table = 'employee';
    public $timestamps = false;

    protected $fillable = [
        'nik',
        'nama',
        'role',
        'jabatan',
        'fungsi',
        'tanggal_mulai_efektif',
        'tanggal_akhir_efektif',
        'current_flag',
    ];

    protected $casts = [
        'tanggal_mulai_efektif' => 'date',
        'tanggal_akhir_efektif' => 'date',
        'current_flag' => 'boolean',
    ];
}
