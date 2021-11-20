<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogVisitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_visitor',
        'nama_perusahaan',
        'jam_masuk',
        'jam_keluar',
        'keperluan',
        'pic_id',
        'ruangan_id',
        'tanggal',
        'ktp',
        'hp'
    ];

    public function ruangan() {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }

    public function pic() {
        return $this->belongsTo(User::class, 'pic_id');
    }
}
