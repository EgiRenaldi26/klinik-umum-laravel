<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class pasien extends Model
{
    use HasFactory ,  Searchable;
    protected $table = 'pasien';
    protected $fillable = ['id','id_pasien','nama_pasien','tanggal_lahir','jenis_kelamin','no_telp'];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }

    public function searchableAs()
    {
        return 'pasien';
    }

    public function toSearchableArray()
    {
        
        return [
            'nama_pasien' =>$this->nama_pasien,
        ];
    }
}
