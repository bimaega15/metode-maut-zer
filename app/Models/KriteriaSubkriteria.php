<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaSubkriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria_subkriteria';
    protected $guarded = ['id'];

    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function getData($whereCondition = [])
    {
        // \DB::connection()->enableQueryLog();
        $getData = KriteriaSubkriteria::with('kriteria', 'subKriteria', 'alternatif');
        if (isset($whereCondition['kriteria_id'])) {
            $getData->where('kriteria_id', 'like', '%' .  $_GET['kriteria_id'] . '%');
        }
        if (isset($whereCondition['sub_kriteria_id'])) {
            $getData->where('sub_kriteria_id', 'like', '%' .  $_GET['sub_kriteria_id'] . '%');
        }
        if (isset($whereCondition['alternatif_id'])) {
            $getData->where('alternatif_id', 'like', '%' .  $_GET['alternatif_id'] . '%');
        }
        $getData = $getData->get();

        // $queries = \DB::getQueryLog();
        $queries = $getData;
        return $queries;
    }
}
