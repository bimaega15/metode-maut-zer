<div class="mb-3">
    <strong>Ranking Siswa</strong>
    <div class="table-responsive" id="">
        <table class="table table-bordered" id="tableRanking">
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>Siswa</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($ranking as $alternatif_id => $nilai)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ Check::getAlternatif($alternatif_id)->nama_alternatif }}</td>
                        <td>{{ number_format($nilai, 3) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
