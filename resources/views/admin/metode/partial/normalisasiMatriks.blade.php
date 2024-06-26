<div class="mb-3">
    <strong>Normalisasi Matriks</strong>
    <div class="table-responsive" id="">
        <table class="table table-bordered" id="tableNormalisasi">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Siswa</th>
                    @foreach ($hasilBagiView as $kriteria_id => $item)
                        <th>{{ Check::getKriteria($kriteria_id)->kode_kriteria }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($normaliasiMatrix as $alternatif_id => $kriteria)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ Check::getAlternatif($alternatif_id)->nama_alternatif }}</td>
                        @foreach ($kriteria as $item)
                            <td>{{ number_format($item, 2) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
