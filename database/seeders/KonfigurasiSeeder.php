<?php

namespace Database\Seeders;

use App\Models\Konfigurasi;
use Illuminate\Database\Seeder;

class KonfigurasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Konfigurasi::create([
            'nama_konfigurasi' => 'Sistem Pendukung Keputusan Metode Maut',
            'logo_konfigurasi' => 'default.png',
            'nohp_konfigurasi' => '082277562382',
            'alamat_konfigurasi' => 'Untuk merekomendasikan siswa yang menerima beasiswa',
            'email_konfigurasi' => 'zeruci15@gmail.com',
            'deskripsi_konfigurasi' => 'Sistem pendukung keputusan metode maut',
            'created_konfigurasi' => 'Zeruci @ TA',
        ]);
    }
}
