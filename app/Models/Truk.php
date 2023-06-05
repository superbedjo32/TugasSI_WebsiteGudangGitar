<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truk extends Model
{
    use HasFactory;
    protected $table = 'truks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Nopol_Truk',
        'id_Supir',
    ];

    public function supir()
    {
        return $this->BelongsTo(Supir::class, 'id_Supir');
    }
}
