<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;
    protected $table = 'rutes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_Gudang',
        'id_Outlet',
    ];
    public function gudang()
    {
        return $this->BelongsTo(Gudang::class, 'id_Gudang');
    }
    public function outlet()
    {
        return $this->BelongsTo(Outlet::class, 'id_Outlet');
    }
}
