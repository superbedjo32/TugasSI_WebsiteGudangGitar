<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    use HasFactory;
    protected $table = 'supirs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Nama_Supir',
        'Alamat_Supir',
        'Telp_Supir',
    ];
    public function Truks()
    {
        return $this->hasMany(Truk::class);
    }
    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class);
    }
}
