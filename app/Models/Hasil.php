<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'hasil';
    protected $guarded = ['id'];

    public function hasilDetail()
    {
        return $this->hasMany(HasilDetail::class);
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
    public function selesaiTest()
    {
        return $this->belongsTo(SelesaiTest::class);
    }
}
