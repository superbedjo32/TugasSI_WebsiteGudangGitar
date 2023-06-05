<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Gitar extends Model
{
    use HasFactory;
    protected $table = 'jenis__gitars';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_jenis',
    ];
    public function gitars()
    {
        return $this->hasMany(Gitar::class);
    }
}
