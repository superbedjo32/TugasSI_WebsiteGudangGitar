<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $table = 'gudangs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Nama_Gudang',
        'Alamat_Gudang',
    ];
    public function rute()
    {
        return $this->hasMany(Rute::class);
    }
}
