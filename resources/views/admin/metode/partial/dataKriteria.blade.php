<div class="mb-3">
    <strong>Data Kriteria</strong>
    <div class="table-responsive">
        <table class="table table-bordered" id="tableDataKriteria">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kriteria</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($dataKriteria as $index => $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->kode_kriteria }}</td>
                        <td>{{ $item->nama_kriteria }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
