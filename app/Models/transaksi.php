<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Transaksi extends Model
{
    use HasFactory, Searchable;

    protected $table = 'transaksi';
    protected $fillable = [
        'no_transaksi',
        'tanggal_transaksi',
        'pasien_id',
        'keluhan',
        'obat_id',
        'rawat_id',
        'total_biaya',
        'uang_bayar',
        'uang_kembali',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function obat()
    {
        return $this->belongsTo(obat::class,'obat_id');
    }

    public function rawat()
    {
        return $this->belongsTo(Rawat::class, 'rawat_id');
    }
}
