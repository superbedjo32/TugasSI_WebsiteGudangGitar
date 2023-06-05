<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $table = 'outlets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Nama_Outlet',
        'Alamat_Outlet',
        'Telp_Outlet',
        'id_users',
    ];
    public function rute()
    {
        return $this->hasMany(Rute::class);
    }
    public function users()
    {
        return $this->BelongsTo(User::class, 'id_users');
    }
    
}
