<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class rawat extends Model
{
    use HasFactory , Searchable;
    protected $table = 'rawat';
    protected $fillable = ['id','lama_rawat','harga'];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }
}
