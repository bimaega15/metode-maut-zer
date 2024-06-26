<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $guarded = ['id'];

    public function subKriteria()
    {
        return $this->hasMany(SubKriteria::class);
    }
    public function kriteriaSubKriteria()
    {
        return $this->hasMany(KriteriaSubkriteria::class);
    }
    public function hasilDetail()
    {
        return $this->hasMany(HasilDetail::class);
    }

    public function getData($whereCondition = [], $limit)
    {
        // \DB::connection()->enableQueryLog();
        $getData = Kriteria::select('*');
        if (isset($whereCondition['kode_kriteria'])) {
            $getData->where('kode_kriteria', 'like', '%' .  $_GET['kode_kriteria'] . '%');
        }
        if (isset($whereCondition['nama_kriteria'])) {
            $getData->where('nama_kriteria', 'like', '%' .  $_GET['nama_kriteria'] . '%');
        }
        if (isset($whereCondition['definisi_kriteria'])) {
            $getData->where('definisi_kriteria', 'like', '%' .  $_GET['definisi_kriteria'] . '%');
        }
        if (isset($whereCondition['bobot_kriteria'])) {
            $getData->where('bobot_kriteria', 'like', '%' .  $_GET['bobot_kriteria'] . '%');
        }
        $getData = $getData->paginate($limit);

        // $queries = \DB::getQueryLog();
        $queries = $getData;
        return $queries;
    }
}
