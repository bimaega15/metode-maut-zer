<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;
    protected $table = 'sub_kriteria';
    protected $guarded = ['id'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function kriteriaSubKriteria()
    {
        return $this->hasMany(KriteriaSubkriteria::class);
    }

    public function getData($whereCondition = [], $limit)
    {
        // \DB::connection()->enableQueryLog();
        $getData = SubKriteria::with('kriteria');
        if (isset($whereCondition['kode_sub_kriteria'])) {
            $getData->where('kode_sub_kriteria', 'like', '%' .  $_GET['kode_sub_kriteria'] . '%');
        }
        if (isset($whereCondition['nama_sub_kriteria'])) {
            $getData->where('nama_sub_kriteria', 'like', '%' .  $_GET['nama_sub_kriteria'] . '%');
        }
        if (isset($whereCondition['kriteria_id'])) {
            $getData->where('kriteria_id', 'like', '%' .  $_GET['kriteria_id'] . '%');
        }
        $getData = $getData->paginate($limit);

        // $queries = \DB::getQueryLog();
        $queries = $getData;
        return $queries;
    }
}
