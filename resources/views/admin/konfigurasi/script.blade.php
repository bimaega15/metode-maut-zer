<script>
    $(document).ready(function(e) {
        loadData();

        function loadData() {
            $.ajax({
                url: "{{ url('/admin/konfigurasi') }}",
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    const {
                        result
                    } = data;

                    let root = `{{ asset('/') }}`
                    if (result != null && result != '') {
                        $('.id').val(result.id);
                        $('.page').val('edit');
                        $('.nama_konfigurasi').val(result.nama_konfigurasi);
                        $('.nohp_konfigurasi').val(result.nohp_konfigurasi);
                        $('.alamat_konfigurasi').val(result.alamat_konfigurasi);
                        $('.email_konfigurasi').val(result.email_konfigurasi);
                        $('.created_konfigurasi').val(result.created_konfigurasi);
                        $('.deskripsi_konfigurasi').val(result.deskripsi_konfigurasi);

                        let linkGambar =
                            `${root}storage/upload/konfigurasi/${result.logo_konfigurasi}`;
                        $('#load_logo_konfigurasi').html(`
                    <a class="photoviewer" href="${linkGambar}" data-gallery="photoviewer" data-title="${result.logo_konfigurasi}">
                        <img width="150px;" class="img-thumbnail" src="${linkGambar}"></img>    
                    </a>
                    `);
                    } else {
                        $('.page').val('edit');
                    }


                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })
        }

        function resetForm(attribute = null) {
            $('.form-submit').trigger("reset");
            $('#load_logo_konfigurasi').html('');

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
                    if (data.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })

                        loadData();

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
