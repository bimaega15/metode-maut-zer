<script>
    $(document).ready(function(e) {
        var table = $('#dataTable').DataTable({
            ajax: {
                url: "{{ route('admin.rule.index') }}",
                dataType: 'json',
                type: 'get',

            },
        });

        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();
            $('input[name="_method"]').val('post');
            let url = "{{ url('/public/') }}";
            $('.form-submit').attr('action', url + '/admin/rule');

            resetForm();
        })

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            const action = $(this).attr('href');
            const root = "{{ asset('/') }}";

            $.ajax({
                url: action,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    const {
                        result
                    } = data;

                    const {
                        gejala,
                        roles
                    } = result;

                    let arrGejala = [];
                    gejala.map((v, i) => {
                        arrGejala.push(v.gejala_id);
                    });

                    arrGejala = arrGejala.join(',');
                    saveSessiondata(arrGejala);

                    $('.kode_rule').val(roles.kode_rule);
                    $('.penyakit_id').val(roles.penyakit_id);
                    $('.id').val(roles.penyakit_id);
                    $('input[name="_method"]').val('put');

                    let url = "{{ url('/public/') }}";
                    $('.form-submit').attr('action', url + '/admin/rule/' + roles
                        .penyakit_id);
                    $('#modalForm').modal('show');
                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })
        })

        var tableGejala = $('#dataTableGejala').DataTable({
            ajax: {
                url: "{{ route('admin.rule.gejala') }}",
                dataType: 'json',
                type: 'get',
            },
            "columnDefs": [{
                orderable: false,
                targets: [0]
            }],
            order: [
                [1, 'asc']
            ],
        });

        function saveSessiondata(data) {
            $.ajax({
                url: "{{ url('/admin/rule/storeSession') }}",
                type: "POST",
                data: {
                    gejala_id: data
                },
                dataType: 'json',
                success: function(data) {
                    if (data.status == 200) {
                        tableGejala.ajax.reload();
                    }
                },
                error: function(xhr) {
                    const {
                        responseText
                    } = xhr;
                    if (responseText != null) {
                        console.log(responseText);
                    }
                }
            });
        }

        function deleteSessionData() {
            $.ajax({
                url: "{{ url('/admin/rule/destroySession') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if (data.status == 200) {
                        tableGejala.ajax.reload();
                    }
                },
                error: function(xhr) {
                    const {
                        responseText
                    } = xhr;
                    if (responseText != null) {
                        console.log(responseText);
                    }
                }
            });
        }

        function resetForm(attribute = null) {
            $('.form-submit').trigger("reset");

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
            var form = $('.form-submit')[0];
            var data = new FormData(form);
            var action = $('.form-submit').attr('action');
            onSubmit(action, data);
        })

        function onSubmit(action, data) {
            $.ajax({
                url: action,
                type: "POST",
                data: data,
                enctype: 'multipart/form-data',
                processData: false, // Important!
                contentType: false,
                cache: false,
                dataType: 'json',
                beforeSend: function() {
                    $('.btn-submit').attr('disabled', true);
                },
                success: function(data) {
                    console.log('get data', data);
                    if (data.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })

                        $('#modalForm').modal('hide');
                        table.ajax.reload();

                        const {
                            result
                        } = data;
                        resetForm(result);
                    }

                    if (data.status == 400) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })

                        $('#modalForm').modal('hide');
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
                        if (responseJSON.result.request != null) {
                            resetError(responseJSON.result.request);
                        }

                        if (responseJSON.result.error != null) {
                            let outputResult = responseJSON.result.error;
                            $.each(outputResult, function(v, i) {
                                let textError = outputResult[v][0];
                                let keyError = v;
                                $('.' + keyError).addClass("border border-danger");
                                $('.error_' + keyError).html(textError);
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

        $(document).on('click', '#checkBoxAll', function() {
            if ($(this).is(':checked')) {
                $('.checkboxItem').prop('checked', true);
            } else {
                $('.checkboxItem').prop('checked', false);
            }

            let checkBoxItem = $('.checkboxItem');
            let valueItem = [];
            let valueItemChecked = [];
            $.each(checkBoxItem, function(v, i) {
                let itemValue = $(this).val();
                valueItem.push(itemValue);
                if ($(this).is(':checked')) {
                    valueItemChecked.push(itemValue);
                }
            })

            onLoadSaveSession(valueItem, valueItemChecked);
        })

        $(document).on('click', '.checkboxItem', function() {
            let lengthItem = $('.checkboxItem').length;
            let lengthItemChecked = $('.checkboxItem:checked').length;
            if (lengthItem == lengthItemChecked) {
                $('#checkBoxAll').prop('checked', true);
            } else {
                $('#checkBoxAll').prop('checked', false);
            }

            let valueItem = [];
            let valueItemChecked = [];
            let valueItemClick = $(this).data('gejala_id');
            valueItem.push(valueItemClick);
            if ($(this).is(':checked')) {
                let value = $(this).val();
                valueItemChecked.push(value);
            }
            onLoadSaveSession(valueItem, valueItemChecked);
        })

        function onLoadSaveSession(valueItem = [], valueItemChecked = []) {
            $.ajax({
                url: "{{ url('/admin/rule/saveSession') }}",
                method: 'post',
                dataType: 'json',
                data: {
                    valueItem,
                    valueItemChecked
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })
        }
    })
</script>
