<div class="mb-3">
    <strong>Hasil Bagi Kriteria / Subkriteria</strong>
    <div class="table-responsive">
        <table class="table table-bordered" id="tableHasilBagi">
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
                @foreach ($hasilBagi as $alternatif_id => $kriteria)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ Check::getAlternatif($alternatif_id)->nama_alternatif }}</td>
                        @foreach ($kriteria as $item)
                            <td>{{ number_format($item, 2) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Minimum</td>
                    @foreach ($minMaxKriteria as $item)
                        <td>{{ number_format($item['min'], 2) }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td colspan="2">Maksiumum</td>
                    @foreach ($minMaxKriteria as $item)
                        <td>{{ number_format($item['max'], 2) }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    </div>
</div>
