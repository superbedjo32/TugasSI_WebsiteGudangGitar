<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;
    protected $table = 'pengirimen';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_users',
        'id_Gitar',
        'Jumlah',
        'Waktu_Pengiriman',
        'id_Supir',
        'id_Rute',
    ];
    public function user()
    {
        return $this->BelongsTo(User::class, 'id_users');
    }
    public function gitar()
    {
        return $this->BelongsTo(Gitar::class, 'id_Gitar');
    }
    public function supir()
    {
        return $this->BelongsTo(Supir::class, 'id_Supir');
    }
}
