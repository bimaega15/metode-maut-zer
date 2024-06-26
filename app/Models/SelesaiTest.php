<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelesaiTest extends Model
{
    use HasFactory;
    protected $table = 'selesai_test';
    protected $guarded = ['id'];

    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }
}
