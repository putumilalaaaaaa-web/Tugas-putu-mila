<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datamember extends Model
{
    protected $table = 'datamember';

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'jenis_membership',
        'tanggal_daftar',
        'tanggal_berakhir',
        'status',
    ];

    protected $casts = [
        'tanggal_daftar' => 'date',
        'tanggal_berakhir' => 'date',
    ];
}
