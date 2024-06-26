@extends('layouts.admin')
@section('title')
    Data Hasil Seleksi
@endsection
@section('content')
    <?php
    $isCreate = session()->get('userAcess.is_create');
    ?>
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="col">
                    <div class="card">
                        @include('utils.session')
                        <div class="card-header">
                            <i data-feather="settings"></i> <strong>Data Hasil Seleksi</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tableHasil">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Judul</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var table = $('#tableHasil').DataTable({
                ajax: {
                    url: "{{ route('admin.hasil.index') }}",
                    dataType: 'json',
                    type: 'get',
                },
            });

            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();
                const action = $(this).closest("form").attr('action');
                Swal.fire({
                    title: 'Deleted',
                    text: "Yakin ingin menghapus item ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: action,
                            dataType: 'json',
                            type: 'post',
                            method: 'DELETE',
                            success: function(data) {
                                if (data.status == 200) {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    );
                                    table.ajax.reload();
                                } else {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'error'
                                    )
                                }

                            },
                            error: function(x, t, m) {
                                console.log(x.responseText);
                            }
                        })
                    }
                })
            })
        })
    </script>
@endpush
