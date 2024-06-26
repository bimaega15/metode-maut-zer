<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilDetail extends Model
{
    use HasFactory;
    protected $table = 'hasil_detail';
    protected $guarded = ['id'];

    public function hasil()
    {
        return $this->belongsTo(Hasil::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
