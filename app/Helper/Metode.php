<?php

namespace App\Helper;

use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\KriteriaSubkriteria;

class Metode
{
    public static function getPerhitunganMetode($request)
    {
        $saveMetode = [];
        $kriteriaSubKriteria = new KriteriaSubkriteria();
        $kriteriaSubKriteria = $kriteriaSubKriteria->getData($request->all());

        // hasil bagi sub
        $hasilBagiSub = [];
        foreach ($kriteriaSubKriteria as $key => $value) {
            $hasilBagiSub[$value->alternatif_id][$value->kriteria_id][] = $value->nilai_kriteria_subkriteria;
        }

        $hasilBagiSub2 = [];
        $hasilBagiInvers = [];
        foreach ($hasilBagiSub as $alternatif_id => $kriteria) {
            foreach ($kriteria as $kriteria_id => $value) {
                $total = array_sum($value) / count($value);
                $hasilBagiSub2[$alternatif_id][$kriteria_id] = $total;
                $hasilBagiInvers[$kriteria_id][$alternatif_id] = $total;
            }
        }
        $saveMetode['metode']['hasilBagi'] = $hasilBagiSub2;
        $saveMetode['metode']['hasilBagiView'] = $hasilBagiInvers;

        // min max kriteria
        $minMaxKriteria = [];
        $inversHasilBagi = [];
        foreach ($hasilBagiSub2 as $alternatif_id => $kriteria) {
            foreach ($kriteria as $kriteria_id => $value) {
                $inversHasilBagi[$kriteria_id][$alternatif_id] = $value;
            }
        }

        foreach ($inversHasilBagi as $kriteria_id => $alternatif) {
            $min = min($alternatif);
            $max = max($alternatif);
            $minMaxKriteria[$kriteria_id]['min'] = $min;
            $minMaxKriteria[$kriteria_id]['max'] = $max;
        }
        $saveMetode['metode']['minMaxKriteria'] = $minMaxKriteria;

        // normalisasi matrix
        $normalisasiMatrix = [];
        $boboKriteria = [];
        foreach ($hasilBagiSub2 as $alternatif_id => $kriteria) {
            foreach ($kriteria as $kriteria_id => $value) {
                $rumus = ($value - $minMaxKriteria[$kriteria_id]['min']) / ($minMaxKriteria[$kriteria_id]['max'] - $minMaxKriteria[$kriteria_id]['min']);

                $normalisasiMatrix[$alternatif_id][$kriteria_id] = $rumus;
                $boboKriteria[$kriteria_id] = Kriteria::find($kriteria_id)->bobot_kriteria / 100;
            }
        }
        $saveMetode['metode']['normaliasiMatrix'] = $normalisasiMatrix;


        // menentukan nilai preferensi
        $preferensi = [];
        foreach ($normalisasiMatrix as $alternatif_id => $kriteria) {
            foreach ($kriteria as $kriteria_id => $value) {
                $hitung = $value * $boboKriteria[$kriteria_id];
                $preferensi[$alternatif_id][$kriteria_id] = $hitung;
            }
        }
        $saveMetode['metode']['preferensi'] = $preferensi;

        // total preferensi
        $totalPreferensi = [];
        foreach ($preferensi as $alternatif_id => $kriteria) {
            $sum  = array_sum($kriteria);
            $totalPreferensi[$alternatif_id] = $sum;
        }
        arsort($totalPreferensi);

        $ranking = $totalPreferensi;
        $saveMetode['metode']['ranking'] = $ranking;
        return $saveMetode;
    }

    public static function getPerhitunganMetodeHasil($selesai_test_id)
    {
        $saveMetode = [];
        $hasil = Hasil::with('hasilDetail', 'alternatif')->where('selesai_test_id', $selesai_test_id)->get();
        $hasilBagiSub = [];
        foreach ($hasil as $key => $value) {
            foreach ($value->hasilDetail as $key2 => $hasilDetail) {
                $hasilBagiSub[$value->alternatif_id][$hasilDetail->kriteria_id] = $hasilDetail->nilai_hasil_detail;
            }
        }
        $hasilBagiSub2 = $hasilBagiSub;
        $saveMetode['metode']['hasilBagi'] = $hasilBagiSub2;

        // min max kriteria
        $minMaxKriteria = [];
        $inversHasilBagi = [];
        foreach ($hasilBagiSub2 as $alternatif_id => $kriteria) {
            foreach ($kriteria as $kriteria_id => $value) {
                $inversHasilBagi[$kriteria_id][$alternatif_id] = $value;
            }
        }

        foreach ($inversHasilBagi as $kriteria_id => $alternatif) {
            $min = min($alternatif);
            $max = max($alternatif);
            $minMaxKriteria[$kriteria_id]['min'] = $min;
            $minMaxKriteria[$kriteria_id]['max'] = $max;
        }
        $saveMetode['metode']['minMaxKriteria'] = $minMaxKriteria;

        // normalisasi matrix
        $normalisasiMatrix = [];
        $boboKriteria = [];
        foreach ($hasilBagiSub2 as $alternatif_id => $kriteria) {
            foreach ($kriteria as $kriteria_id => $value) {
                $rumus = ($value - $minMaxKriteria[$kriteria_id]['min']) / ($minMaxKriteria[$kriteria_id]['max'] - $minMaxKriteria[$kriteria_id]['min']);

                $normalisasiMatrix[$alternatif_id][$kriteria_id] = $rumus;
                $boboKriteria[$kriteria_id] = Kriteria::find($kriteria_id)->bobot_kriteria / 100;
            }
        }
        $saveMetode['metode']['normaliasiMatrix'] = $normalisasiMatrix;


        // menentukan nilai preferensi
        $preferensi = [];
        foreach ($normalisasiMatrix as $alternatif_id => $kriteria) {
            foreach ($kriteria as $kriteria_id => $value) {
                $hitung = $value * $boboKriteria[$kriteria_id];
                $preferensi[$alternatif_id][$kriteria_id] = $hitung;
            }
        }
        $saveMetode['metode']['preferensi'] = $preferensi;

        // total preferensi
        $totalPreferensi = [];
        foreach ($preferensi as $alternatif_id => $kriteria) {
            $sum  = array_sum($kriteria);
            $totalPreferensi[$alternatif_id] = $sum;
        }
        arsort($totalPreferensi);

        $ranking = $totalPreferensi;
        $saveMetode['metode']['ranking'] = $ranking;
        return $saveMetode;
    }
}
