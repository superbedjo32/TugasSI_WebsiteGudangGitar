<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gitar extends Model
{
    use HasFactory;
    protected $table = 'gitars';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Nama_Gitar',
        'Stok',
        'id_Jenis',
    ];
    public function jenis()
    {
        return $this->BelongsTo(Jenis_Gitar::class, 'id_Jenis');
    }
    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class);
    }
}
