<div class="mb-3">
    <strong>Nilai Preferensi</strong>
    <div class="table-responsive">
        <table class="table table-bordered" id="tablePreferensi">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Alternatif</th>
                    <th>Preferensi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($preferensi as $alternatif_id => $item)
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
                        <td>{{ $searchAlternatif[0]['nama_alternatif'] }}</td>
                        <td>{{ number_format($item, 3, '.', ',') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
