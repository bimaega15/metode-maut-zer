<script>
    $(document).ready(function(e) {
        var table = $('#dataTable').DataTable({
            ajax: {
                url: "{{ route('admin.menu.index') }}",
                dataType: 'json',
                type: 'get',
            },
        });

        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();
            $('input[name="_method"]').val('post');
            let url = "{{ url('/') }}";
            $('.form-submit').attr('action', url + '/admin/menu');

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

                    $('.no_management_menu').val(result.no_management_menu);
                    $('.nama_management_menu').val(result.nama_management_menu);
                    $('.icon_management_menu').val(result.icon_management_menu);
                    $('.link_management_menu').val(result.link_management_menu);
                    $('input[name="_method"]').val('put');

                    let url = "{{ url('/') }}";
                    $('.form-submit').attr('action', url + '/admin/menu/' + result.id);
                    $('#modalForm').modal('show');
                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })
        })

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


        function resetFormSubMenu(attribute = []) {
            $('.form-submit-sub-menu').trigger("reset");

            if (attribute != null) {
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

        // sub-menu
        $(document).on('click', '.btn-submit-sub-menu', function(e) {
            e.preventDefault();
            $('.form-submit-sub-menu').submit();
        })

        $(document).on('submit', '.form-submit-sub-menu', function(e) {
            e.preventDefault();
            var form = $('.form-submit-sub-menu')[0];
            var data = new FormData(form);
            var action = $('.form-submit-sub-menu').attr('action');
            onSubmitSubMenu(action, data);
        })

        function onSubmitSubMenu(action, data) {
            $.ajax({
                url: action,
                type: "POST",
                data: data,
                enctype: 'multipart/form-data',
                processData: false, // Important!
                contentType: false,
                cache: false,
                dataType: 'json',
                success: function(data) {
                    if (data.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })

                        $('#modalSubMenu').modal('hide');
                        table.ajax.reload();

                        const {
                            result
                        } = data;

                        resetFormSubMenu(result);
                    }

                    if (data.status == 400) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })

                        $('#modalSubMenu').modal('hide');
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

        function findIdMenu(id) {
            let root = `{{ url('/') }}`;
            let url = root + "/admin/menu/" + id + "/edit";
            $.ajax({
                url: url,
                method: 'get',
                dataType: 'json',
                async: false,
                success: function(data) {
                    const {
                        result
                    } = data;

                    dataResult = result;
                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })
            return dataResult;
        }

        $(document).on('click', '.btn-show-menu', function(e) {
            e.preventDefault();

            let url = $(this).attr('href');
            let id = $(this).data('id');
            $.ajax({
                url: url,
                dataType: 'json',
                type: 'get',
                success: function(data) {
                    if (data.status == 200) {
                        const {
                            result
                        } = data;
                        let getDataMenu = findIdMenu(id);
                        console.log('get data menu', getDataMenu);
                        let dataSubMenu = [];
                        if (getDataMenu.is_node_management_menu != null) {
                            dataSubMenu = getDataMenu.membawahi_menu_management_menu;
                            dataSubMenu = dataSubMenu.split(',');
                        }

                        let output = `
                        <option value="">-- Menu --</option>
                        `;
                        $.each(result, function(i, v) {
                            if (id != v.id) {
                                let checkArraySubMenu = dataSubMenu.includes(String(
                                    v.id));
                                output += `
                            <option value="${v.id}" ${checkArraySubMenu == true ? 'selected' : ''}>${v.icon_management_menu} | ${v.nama_management_menu}</option>
                            `;
                            }
                        })
                        let url = "{{ url('/') }}"
                        $('.form-submit-sub-menu').attr('action',
                            `${url}/admin/menu/${id}/postSubMenu`);

                        $('.management_menu_id').html(output);

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
        })

        $('.select2').select2({
            theme: 'bootstrap-5'
        });

        $('.multiple-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    })
</script>
