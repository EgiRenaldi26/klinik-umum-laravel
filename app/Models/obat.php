<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class obat extends Model
{
    use HasFactory ,  Searchable;
    protected $table = 'obat';
    protected $fillable = ['foto','nama_obat','jenis_obat','dosis','stok','keterangan','harga_obat'];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }

    public function searchableAs()
    {
        return 'obat';
    }

    public function toSearchableArray()
    {
        
        return [
            'nama_obat' =>$this->nama_obat,
        ];
    }
}
