<div class="mb-3">
    <strong>Nilai Terkecil dan Terbesar dari setiap kriteria</strong>
    <div class="table-responsive" id="">
        <table class="table table-bordered">
            <tr>
                <td>A-</td>
                @foreach ($minMaxKriteria as $item)
                    <td>{{ $item['min'] }}</td>
                @endforeach
            </tr>
            <tr>
                <td>A+</td>
                @foreach ($minMaxKriteria as $item)
                    <td>{{ $item['max'] }}</td>
                @endforeach
            </tr>
        </table>
    </div>
</div>
