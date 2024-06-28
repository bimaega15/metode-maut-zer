<div class="mb-3">
    <strong>Ranking</strong>
    <div class="table-responsive">
        <table class="table table-bordered" id="tableRanking">
            <thead>
                <tr>
                    <th>Alternatif</th>
                    <th>Ranking</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($ranking as $alternatif_id => $item)
                    @php
                        $searchAlternatif = array_filter($dataAlternatif->toArray(), function ($value) use (
                            $alternatif_id,
                        ) {
                            return $value['id'] == $alternatif_id;
                        });
                        $searchAlternatif = array_values($searchAlternatif);
                    @endphp
                    <tr>
                        <td>{{ $searchAlternatif[0]['nama_alternatif'] }}</td>
                        <td>{{ $no++ }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
