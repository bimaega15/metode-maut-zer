<div class="mb-3">
    <strong>Matriks Ternormalisasi</strong>
    <div class="table-responsive" id="">
        <table class="table table-bordered" id="tableMatriksTernormalisasi">
            <thead>
                <tr>
                    <th>No.</th>
                    @foreach ($dataKriteria as $index => $item)
                        <th>{{ $item->kode_kriteria }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($matriksTernormalisasi as $alternatif_id => $vAlternatif)
                    <tr>
                        <td>{{ $no++ }}</td>
                        @foreach ($vAlternatif as $kriteria_id => $item)
                            <td>{{ $item }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
