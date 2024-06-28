<div class="mb-3">
    <strong>Normalisasi Matriks Keputusan</strong>
    <div class="table-responsive">
        <table class="table table-bordered" id="tableMatriksNormalisasiKeputusan">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Alternatif</th>
                    @foreach ($dataKriteria as $item)
                        <th>{{ $item->kode_kriteria }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($normalisasiMatrixKeputusan as $alternatif_id => $item)
                    @php
                        $searchAlternatif = array_filter($dataAlternatif->toArray(), function ($value) use (
                            $alternatif_id,
                        ) {
                            return $value['id'] == $alternatif_id;
                        });
                        $searchAlternatif = array_values($searchAlternatif);
                    @endphp
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            {{ $searchAlternatif[0]['nama_alternatif'] }}
                        </td>
                        @foreach ($item as $index => $rowItem)
                            <td>{{ number_format($rowItem, 3, '.', ',') }}</td>
                        @endforeach
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
