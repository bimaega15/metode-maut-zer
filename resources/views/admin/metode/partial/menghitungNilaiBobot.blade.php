<div class="mb-3">
    <strong>Menghitung Nilai Bobot (W)</strong>
    <div class="table-responsive" id="">
        <table class="table table-bordered" id="tableNilaiBobot">
            <thead>
                <tr>
                    <th>Variabel</th>
                    <th>Bobot</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($bobotNilaiKriteria as $alternatif_id => $item)
                    <tr>
                        <td>W{{ $no++ }}</td>
                        <td>{{ number_format($item, 3, '.', ',') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
