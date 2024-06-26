<script>
    $(document).ready(function(e) {
        var table = $('#dataTable').DataTable({
            ajax: {
                url: "{{ route('admin.access.index') }}",
                dataType: 'json',
                type: 'get',
            },
        });

        // $('#tableMenuAccess').DataTable();

        $(document).on('click', '.btn-menu-access', function() {
            let roles_id = $(this).data('roles_id');
            let action = $('.form-submit-access').attr('action');
            onMenuAccess(action, roles_id);
        })

        function onMenuAccess(action, roles_id) {
            $.ajax({
                url: action,
                method: 'get',
                dataType: 'json',
                data: {
                    roles_id: roles_id
                },
                success: function(data) {
                    const {
                        result
                    } = data;

                    let output = ``;
                    let no = 1;
                    result.map((v, i) => {
                        const {
                            management_menu
                        } = v;
                        output += `
                        <tr>
                            <td>${no++}</td>    
                            <td>${management_menu.icon_management_menu} | ${management_menu.nama_management_menu}</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input is_create" type="checkbox" value="${v.id}" id="flexCheckDefaultCreate" name="is_create" ${v.is_create == '1' ? 'checked' : ''}>
                                    <label class="form-check-label" for="flexCheckDefaultCreate">
                                    </label>
                                </div>
    
                            </td> 
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input is_update" type="checkbox" value="${v.id}" id="flexCheckDefaultUpdate" name="is_update" ${v.is_update == '1' ? 'checked' : ''}>
                                    <label class="form-check-label" for="flexCheckDefaultUpdate">
                                    </label>
                                </div>
                            </td> 
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input is_delete" type="checkbox" value="${v.id}" id="flexCheckDefaultDelete" name="is_delete" ${v.is_delete == '1' ? 'checked' : ''}>
                                    <label class="form-check-label" for="flexCheckDefaultDelete">
                                    </label>
                                </div>    
                            </td> 
                        </tr>
                        `;
                    })

                    $('.form-submit-access').find('tbody').html(output);
                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })
        }

        function resetForm(attribute = null) {
            $('.form-submit').trigger("reset");

            if (attribute != null && attribute != '') {
                $.each(attribute, function(v, i) {
                    $('.' + v).removeClass("border border-danger");
                    $('.error_' + v).html('');
                })
            }

            let itemMenu = $('#loadManagementMenuChoose .item-menu');
            $('#loadManagementMenu').append(itemMenu);
        }

        function resetError(attribute = null) {
            if (attribute != null && attribute != '') {
                $.each(attribute, function(v, i) {
                    $('.' + v).removeClass("border border-danger");
                    $('.error_' + v).html('');
                })
            }
        }


        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();
            $('input[name="_method"]').val('post');
            let url = "{{ url('/public/') }}";
            $('.form-submit').attr('action', url + '/admin/access');

            resetForm();
        })

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            const action = $(this).attr('href');
            $.ajax({
                url: action,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    const {
                        result
                    } = data;

                    const {
                        managementMenu,
                        roles
                    } = result;

                    $('.roles_id').val(roles.roles_id);
                    $('.id').val(roles.roles_id);

                    let itemMenu = $('#loadManagementMenuChoose .item-menu');
                    $('#loadManagementMenu').append(itemMenu);

                    managementMenu.map((v, i) => {
                        let append = $('.item-menu[data-management_menu_id="' + v
                            .management_menu_id + '"]');
                        $('#loadManagementMenuChoose').append(append);
                    })

                    $('input[name="_method"]').val('put');

                    let url = "{{ url('/public/') }}";
                    $('.form-submit').attr('action', url + '/admin/access/' + roles
                        .roles_id);
                    $('#modalForm').modal('show');
                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })
        })

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



        // load management menu
        onLoadManagementMenu();

        function onLoadManagementMenu(chooseMenu = null) {
            $.ajax({
                url: "{{ url('/admin/access/managementMenu') }}",
                type: "get",
                dataType: 'json',
                success: function(data) {
                    if (data.status == 200) {
                        const {
                            result
                        } = data;
                        // management menu
                        let output = '';
                        result.map((v, i) => {
                            toggleClass = 'p-3 bg-light text-dark item-menu';
                            selected = '';

                            output += `
                            <div data-management_menu_id="${v.id}" class="${toggleClass}" data-selected="${selected}" style="cursor: pointer; margin-bottom: 5px;">${v.icon_management_menu} | ${v.nama_management_menu} | ${v.link_management_menu}</div>
                            `;
                        })

                        $('#loadManagementMenu').html(output);
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

        $(document).on('click', '.item-menu', function(e) {
            e.preventDefault();
            let management_menu_id = $(this).data('management_menu_id');
            let className = $(this).attr('class');

            if (className == 'p-3 bg-light text-dark item-menu') {
                toggleClass = 'p-3 bg-info text-white item-menu';
                selected = 'selected';
            } else {
                toggleClass = 'p-3 bg-light text-dark item-menu';
                selected = '';
            }

            $(this).attr('class', toggleClass);
            $(this).attr('data-selected', selected);
        })

        $(document).on('click', '.chooseValueMenu', function(e) {
            e.preventDefault();
            let selected = $('.item-menu[data-selected="selected"]').attr({
                'class': 'p-3 bg-light text-dark item-menu',
                'data-selected': ''
            });
            $('#loadManagementMenuChoose').append(selected).hide().show('slow');
        })

        $(document).on('click', '.backValueMenu', function(e) {
            e.preventDefault();
            let selected = $('.item-menu[data-selected="selected"]').attr({
                'class': 'p-3 bg-light text-dark item-menu',
                'data-selected': ''
            });
            $('#loadManagementMenu').append(selected).hide().show('slow');
        })

        $(document).on('click', '.btn-submit', function(e) {
            e.preventDefault();
            $('.form-submit').submit();
        })

        $(document).on('submit', '.form-submit', function(e) {
            e.preventDefault();
            let data = {};
            roles_id = $('.roles_id').val();
            let management_menu_id = $('#loadManagementMenuChoose .item-menu');
            let pushManagementMenuId = [];
            $.each(management_menu_id, function(i, v) {
                let value = $(this).data('management_menu_id');
                pushManagementMenuId.push(value);
            })

            data.id = $('.id').val();
            data.roles_id = roles_id;
            data.management_menu_id = pushManagementMenuId;
            data._method = $('input[name="_method"]').val();
            let action = $('.form-submit').attr('action');
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


        // access menu
        $(document).on('click', '.is_create', function() {
            let status = 'create';
            let value = $(this).val();
            let valueChecked = null;
            if ($(this).is(':checked')) {
                valueChecked = $(this).val();
            }

            let data = {
                status,
                value,
                valueChecked
            }
            console.log(data);
            onAccessMenu(data);
        })
        $(document).on('click', '.is_update', function() {
            let status = 'update';
            let value = $(this).val();
            let valueChecked = null;
            if ($(this).is(':checked')) {
                valueChecked = $(this).val();
            }

            let data = {
                status,
                value,
                valueChecked
            }
            onAccessMenu(data);
        })
        $(document).on('click', '.is_delete', function() {
            let status = 'delete';
            let value = $(this).val();
            let valueChecked = null;
            if ($(this).is(':checked')) {
                valueChecked = $(this).val();
            }

            let data = {
                status,
                value,
                valueChecked
            }
            onAccessMenu(data);
        })

        function onAccessMenu(data) {
            $.ajax({
                url: "{{ url('/admin/access/updateAccess') }}",
                type: "POST",
                data: data,
                dataType: 'json',
                success: function(data) {
                    console.log('data', data);
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
    })
</script>
