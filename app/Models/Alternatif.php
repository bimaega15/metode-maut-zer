<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $table = 'alternatif';
    protected $guarded = ['id'];

    public function kriteriaSubKriteria()
    {
        return $this->hasMany(KriteriaSubkriteria::class);
    }
    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }

    public function getData($whereCondition = [], $limit)
    {
        // \DB::connection()->enableQueryLog();
        $getData = Alternatif::select('*');
        if (isset($whereCondition['nama_alternatif'])) {
            $getData->where('nama_alternatif', 'like', '%' . $_GET['nama_alternatif'] . '%');
        }
        if (isset($whereCondition['nip_alternatif'])) {
            $getData->where('nip_alternatif', 'like', '%' . $_GET['nip_alternatif'] . '%');
        }
        if (isset($whereCondition['email_alternatif'])) {
            $getData->where('email_alternatif', 'like', '%' . $_GET['email_alternatif'] . '%');
        }
        if (isset($whereCondition['alamat_alternatif'])) {
            $getData->where('alamat_alternatif', 'like', '%' . $_GET['alamat_alternatif'] . '%');
        }
        if (isset($whereCondition['nohp_alternatif'])) {
            $getData->where('nohp_alternatif', 'like', '%' . $_GET['nohp_alternatif'] . '%');
        }
        if (isset($whereCondition['jenis_kelamin_alternatif'])) {
            $getData->where('jenis_kelamin_alternatif', 'like', '%' . $_GET['jenis_kelamin_alternatif'] . '%');
        }

        $getData = $getData->paginate($limit);

        // $queries = \DB::getQueryLog();
        $queries = $getData;
        return $queries;
    }
}
