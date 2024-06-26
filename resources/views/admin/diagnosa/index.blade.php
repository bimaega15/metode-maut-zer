@extends('layouts.admin')
@section('title')
    Diagnosa
@endsection
@section('content')
    <div class="page-content">
        <div class="main-wrapper">
            <div class="card">
                <div class="card-header">
                    <i data-feather="book-open"></i> <strong>Form Konsultasi</strong>
                </div>
                <div class="card-body">
                    <form action="{{ url('/') }}/admin/diagnosa/konsultasiGejala" method="post" class="form-submit">
                        @csrf
                        <input type="hidden" name="gejala_id_konsultasi" class="gejala_id_konsultasi">
                        <input type="hidden" name="penyakit_id_konsultasi" class="penyakit_id_konsultasi">
                        <input type="hidden" name="bobot_user_id_konsultasi" class="bobot_user_id_konsultasi">
                        <div id="form-group-penyakit">
                            <div class="mb-3">
                                <label for="penyakit_id" class="form-label">Pilih tingkat kecanduan</label>
                                <select name="penyakit_id" class="form-control penyakit_id" id="penyakit_id">
                                    <option value="">-- Select --</option>
                                    @foreach ($penyakit as $item)
                                        <option value="{{ $item->id }}">{{ $item->kode_penyakit }} |
                                            {{ $item->nama_penyakit }} | {{ $item->deskripsi_penyakit }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-danger error_penyakit_id"></small>
                            </div>
                            <hr>
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-dark m-b-xs btn-select-penyakit"> Selanjutnya
                                    <i data-feather="arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div id="load_gejala_penyakit"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    @include('admin.diagnosa.script')
@endpush
