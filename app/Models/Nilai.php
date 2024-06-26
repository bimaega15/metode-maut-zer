<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $guarded = ['id'];

    public function getData($whereCondition = [], $limit)
    {
        // \DB::connection()->enableQueryLog();
        $getData = Nilai::select('*');
        if (isset($whereCondition['nama_nilai'])) {
            $getData->where('nama_nilai', 'like', '%' .  $_GET['nama_nilai'] . '%');
        }
        if (isset($whereCondition['value_nilai'])) {
            $getData->where('value_nilai', 'like', '%' .  $_GET['value_nilai'] . '%');
        }
        $getData = $getData->paginate($limit);

        // $queries = \DB::getQueryLog();
        $queries = $getData;
        return $queries;
    }
}
