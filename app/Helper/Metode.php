<?php

namespace App\Helper;

use App\Models\Alternatif;
use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\KriteriaSubkriteria;

class Metode
{
    public static function getPerhitunganMetode($request)
    {
        // METODE RANK ORDER CENTROID
        $saveMetode = [];

        //  MENENTUKAN PRIORITAS KRITERIA DARI YANG TERTINGGI HINGGA PRIORITAS KRITERIA TERENDAH
        $getKriteria = Kriteria::orderBy('bobot_kriteria', 'asc')->get();
        $getAlternatif = Alternatif::all();
        $saveMetode['metode']['dataKriteria'] = $getKriteria;
        $saveMetode['metode']['dataAlternatif'] = $getAlternatif;

        //  MENGHITUNG NILAI BOBOT (W) DARI SETIAP KRITERIA YANG TELAH DI TENTUKAN
        $menghitungNilaiBobot = [];
        $count = $getKriteria->count();
        foreach ($getKriteria as $index => $value) {
            $totalNumber = 0;
            foreach ($getKriteria as $index2 => $item) {
                $getNumber = $index2 + 1;
                $calculate =  1 / $getNumber;
                if ($index > $index2) {
                    $calculate = 0;
                }
                $totalNumber += $calculate;
            }
            $menghitungNilaiBobot[$value->id] = $totalNumber / $count;
        }

        // SEHINGGA DIDAPATKAN LAH NILAI KRITERIA
        $saveMetode['metode']['bobotNilaiKriteria'] = $menghitungNilaiBobot;

        // MEMBUAT MATRIKS TERNORMALISASI
        $kriteriaSubKriteria = new KriteriaSubkriteria();
        $kriteriaSubKriteria = $kriteriaSubKriteria->getData($request->all());

        $matriksTernormalisasi = [];
        foreach ($kriteriaSubKriteria as $key => $value) {
            $matriksTernormalisasi[$value->alternatif_id][$value->kriteria_id] = $value->nilai_kriteria_subkriteria;
        }
        $saveMetode['metode']['matriksTernormalisasi'] = $matriksTernormalisasi;

        // SETELAH ITU TENTUKAN DARI NILAI TERKECIL DAN TERBESAR DARI SETIAP KRITERIA
        $invers = [];
        foreach ($matriksTernormalisasi as $alternatif_id => $vKriteria) {
            foreach ($vKriteria as $kriteria_id => $value) {
                $invers[$kriteria_id][$alternatif_id] = $value;
            }
        }

        $minMaxKriteria = [];
        foreach ($invers as $kriteria_id => $value) {
            $minMaxKriteria[$kriteria_id]['min'] = min($value);
            $minMaxKriteria[$kriteria_id]['max'] = max($value);
        }
        $saveMetode['metode']['minMaxKriteria'] = $minMaxKriteria;


        // NORMALISASI MATRIKS KEPUTUSAN
        $normalisasiMatrixKeputusan = [];
        foreach ($matriksTernormalisasi as $alternatif_id => $vKriteria) {
            foreach ($vKriteria as $kriteria_id => $value) {
                $rumus = ($value - $minMaxKriteria[$kriteria_id]['min']) / ($minMaxKriteria[$kriteria_id]['max'] - $minMaxKriteria[$kriteria_id]['min']);

                $normalisasiMatrixKeputusan[$alternatif_id][$kriteria_id] = $rumus;
            }
        }
        $saveMetode['metode']['normalisasiMatrixKeputusan'] = $normalisasiMatrixKeputusan;

        // PENJUMLAHAN HASIL PERKALIAN DARI NORMALISASI MATRIKS DENGAN BOBOT KRITERIA
        $preferensi = [];
        foreach ($normalisasiMatrixKeputusan as $alternatif_id => $vAlternatif) {
            $calculate = 0;
            foreach ($vAlternatif as $kriteria_id => $itemAlternatif) {
                $calculate += $itemAlternatif * $menghitungNilaiBobot[$kriteria_id];
            }
            $preferensi[$alternatif_id] = $calculate;
        }

        $saveMetode['metode']['preferensi'] = $preferensi;

        // RANKING
        arsort($preferensi);
        $ranking = $preferensi;
        $saveMetode['metode']['ranking'] = $ranking;
        return $saveMetode;
    }

    public static function getPerhitunganMetodeHasil($selesai_test_id)
    {
        $saveMetode = [];
        //  MENENTUKAN PRIORITAS KRITERIA DARI YANG TERTINGGI HINGGA PRIORITAS KRITERIA TERENDAH
        $getKriteria = Kriteria::orderBy('bobot_kriteria', 'asc')->get();
        $getAlternatif = Alternatif::all();
        $saveMetode['metode']['dataKriteria'] = $getKriteria;
        $saveMetode['metode']['dataAlternatif'] = $getAlternatif;

        //  MENGHITUNG NILAI BOBOT (W) DARI SETIAP KRITERIA YANG TELAH DI TENTUKAN
        $menghitungNilaiBobot = [];
        $count = $getKriteria->count();
        foreach ($getKriteria as $index => $value) {
            $totalNumber = 0;
            foreach ($getKriteria as $index2 => $item) {
                $getNumber = $index2 + 1;
                $calculate =  1 / $getNumber;
                if ($index > $index2) {
                    $calculate = 0;
                }
                $totalNumber += $calculate;
            }
            $menghitungNilaiBobot[$value->id] = $totalNumber / $count;
        }
        // SEHINGGA DIDAPATKAN LAH NILAI KRITERIA
        $saveMetode['metode']['bobotNilaiKriteria'] = $menghitungNilaiBobot;

        $hasil = Hasil::with('hasilDetail', 'alternatif')->where('selesai_test_id', $selesai_test_id)->get();
        $hasilBagiSub = [];
        foreach ($hasil as $key => $value) {
            foreach ($value->hasilDetail as $key2 => $hasilDetail) {
                $hasilBagiSub[$value->alternatif_id][$hasilDetail->kriteria_id] = $hasilDetail->nilai_hasil_detail;
            }
        }
        $hasilBagiSub2 = $hasilBagiSub;

        $matriksTernormalisasi = $hasilBagiSub2;
        $saveMetode['metode']['matriksTernormalisasi'] = $matriksTernormalisasi;

        // SETELAH ITU TENTUKAN DARI NILAI TERKECIL DAN TERBESAR DARI SETIAP KRITERIA
        $invers = [];
        foreach ($matriksTernormalisasi as $alternatif_id => $vKriteria) {
            foreach ($vKriteria as $kriteria_id => $value) {
                $invers[$kriteria_id][$alternatif_id] = $value;
            }
        }

        $minMaxKriteria = [];
        foreach ($invers as $kriteria_id => $value) {
            $minMaxKriteria[$kriteria_id]['min'] = min($value);
            $minMaxKriteria[$kriteria_id]['max'] = max($value);
        }
        $saveMetode['metode']['minMaxKriteria'] = $minMaxKriteria;


        // NORMALISASI MATRIKS KEPUTUSAN
        $normalisasiMatrixKeputusan = [];
        foreach ($matriksTernormalisasi as $alternatif_id => $vKriteria) {
            foreach ($vKriteria as $kriteria_id => $value) {
                $rumus = ($value - $minMaxKriteria[$kriteria_id]['min']) / ($minMaxKriteria[$kriteria_id]['max'] - $minMaxKriteria[$kriteria_id]['min']);

                $normalisasiMatrixKeputusan[$alternatif_id][$kriteria_id] = $rumus;
            }
        }
        $saveMetode['metode']['normalisasiMatrixKeputusan'] = $normalisasiMatrixKeputusan;

        // PENJUMLAHAN HASIL PERKALIAN DARI NORMALISASI MATRIKS DENGAN BOBOT KRITERIA
        $preferensi = [];
        foreach ($normalisasiMatrixKeputusan as $alternatif_id => $vAlternatif) {
            $calculate = 0;
            foreach ($vAlternatif as $kriteria_id => $itemAlternatif) {
                $calculate += $itemAlternatif * $menghitungNilaiBobot[$kriteria_id];
            }
            $preferensi[$alternatif_id] = $calculate;
        }

        $saveMetode['metode']['preferensi'] = $preferensi;

        // RANKING
        arsort($preferensi);
        $ranking = $preferensi;
        $saveMetode['metode']['ranking'] = $ranking;
        return $saveMetode;
    }
}
