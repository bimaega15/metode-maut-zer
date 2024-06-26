<script>
    $(document).ready(function(e) {
        var table = $('#dataTable').DataTable({
            ajax: {
                url: "{{ route('admin.penilaian.index') }}",
                dataType: 'json',
                type: 'get',
            },
        });

        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();
            let url = "{{ url('/public/') }}";
            $('input[name="_method"]').val('post');
            $('.form-submit').attr('action', url + '/admin/penilaian/store');

            let id = $(this).data('id');
            $('.alternatif_id').val(id);
            resetForm();
        })

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();
            const id = $(this).data('id');

            $.ajax({
                url: `{{ url('/admin/penilaian/${id}/edit') }}`,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    const {
                        result
                    } = data;

                    result.map((v, i) => {
                        $('.nilai_kriteria_subkriteria[data-sub_kriteria_id="' + v
                            .sub_kriteria.id + '"]').val(v
                            .nilai_kriteria_subkriteria);
                    })

                    $('input[name="_method"]').val('put');

                    let url = `{{ url('/') }}`;
                    let action = url + '/admin/penilaian/' + id + '/update';
                    $('.form-submit').attr('action', action);

                    $('#modalPenilaian').modal('show');
                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })
        })

        function resetForm(attribute = null) {
            $('.form-submit').trigger("reset");
            $('#load_gambar_penilaian').html('');
            if (attribute != null && attribute != '') {
                $.each(attribute, function(v, i) {
                    $('.' + v).removeClass("border border-danger");
                    $('.error_' + v).html('');
                })
            }
        }

        function resetError(attribute = null) {
            if (attribute != null && attribute != '') {
                $.each(attribute, function(v, i) {
                    $('.' + v).removeClass("border border-danger");
                    $('.error_' + v).html('');
                })
            }
        }

        $(document).on('click', '.btn-submit', function(e) {
            e.preventDefault();
            $('.form-submit').submit();
        })

        $(document).on('submit', '.form-submit', function(e) {
            e.preventDefault();
            let pushKriteriaId = [];
            let kriteriaId = $('.kriteria_id');
            $.each(kriteriaId, function(i, v) {
                let value = $(this).val();
                pushKriteriaId.push(value);
            })
            let kriteria_id = pushKriteriaId.join(',');

            let pushSubKriteriaId = [];
            let subKriteriaId = $('.sub_kriteria_id');
            $.each(subKriteriaId, function(i, v) {
                let value = $(this).val();
                pushSubKriteriaId.push(value);
            })
            let sub_kriteria_id = pushSubKriteriaId.join(',');

            let pushNilaiKriteriaSubkriteria = [];
            let nilaiKriteriaSubKriteria = $('.nilai_kriteria_subkriteria');
            $.each(nilaiKriteriaSubKriteria, function(i, v) {
                let value = $(this).val();
                pushNilaiKriteriaSubkriteria.push(value);
            })
            let nilai_kriteria_subkriteria = pushNilaiKriteriaSubkriteria.join(',');
            let alternatif_id = $('.alternatif_id').val();

            let data = {};
            data.kriteria_id = kriteria_id;
            data.sub_kriteria_id = sub_kriteria_id;
            data.nilai_kriteria_subkriteria = nilai_kriteria_subkriteria;
            data.alternatif_id = alternatif_id;
            data._method = $('._method').val();

            let action = $(this).attr('action');
            onSubmit(action, data);
        })

        function onSubmit(action, data) {
            $.ajax({
                url: action,
                type: "POST",
                data: data,
                dataType: 'json',
                beforeSend: function() {
                    $('.btn-submit').attr('disabled', true);
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })

                        $('#modalPenilaian').modal('hide');
                        table.ajax.reload();
                    }

                    if (data.status == 400) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })

                        $('#modalPenilaian').modal('hide');
                        table.ajax.reload();
                    }
                },
                error: function(xhr) {
                    const {
                        responseJSON,
                        responseText
                    } = xhr;
                    if (responseText != null) {
                        console.log(responseText);
                    }

                    if (responseJSON != null) {
                        if (responseJSON.result.error != null) {
                            let outputMessage = responseJSON.message;
                            let outputResult = responseJSON.result.error.nilai_kriteria_subkriteria[
                                0];

                            Swal.fire({
                                icon: 'info',
                                title: outputMessage,
                                text: outputResult,
                            })
                        }
                    }
                },
                complete: function() {
                    $('.btn-submit').attr('disabled', false);
                }
            });
        }

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

        // initialize manually with a list of links
        $(document).on('click', '[data-gallery="photoviewer"]', function(e) {
            e.preventDefault();
            var items = [],
                options = {
                    index: $('.photoviewer').index(this),
                };

            $('[data-gallery="photoviewer"]').each(function() {
                items.push({
                    src: $(this).attr('href'),
                    title: $(this).attr('data-title')
                });
            });

            new PhotoViewer(items, options);
        });
    })
</script>
