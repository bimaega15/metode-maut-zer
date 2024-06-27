<script>
    $(document).ready(function(e) {
        loadData();

        function loadData() {
            $.ajax({
                url: "{{ url('/admin/profile') }}",
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    const {
                        result
                    } = data;

                    let root = `{{ asset('/') }}`;
                    $('.id').val(result.id);
                    $('.password_old').val(result.password);
                    $('.username').val(result.username);
                    $('.role_id').val(result.roles[0].id);

                    $('.nama_profile').val(result.profile.nama_profile);
                    $('.email_profile').val(result.profile.email_profile);
                    $('.nohp_profile').val(result.profile.nohp_profile);
                    $('.jenis_kelamin_profile[value="' + result
                            .profile.jenis_kelamin_profile + '"]')
                        .attr('checked', true);

                    $('.alamat_profile').val(result.profile.alamat_profile);
                    let linkGambar =
                        `${root}storage/upload/profile/${result.profile.gambar_profile}`;
                    $('#load_gambar_profile').html(`
                    <a class="photoviewer" href="${linkGambar}" data-gallery="photoviewer" data-title="${result.profile.gambar_profile}">
                        <img class="img-thumbnail" class="w-25" src="${linkGambar}"></img>    
                    </a>
                    `);
                    $('input[name="_method"]').val('put');

                    let url = "{{ url('/') }}";
                    $('.form-submit').attr('action', url + '/admin/profile/' + result.id);


                    // html
                    let jenisKelamin = result.profile.jenis_kelamin_profile == 'L' ? 'Laki-laki' :
                        'Perempuan';
                    $('.username_html').html(result.username);
                    $('.roles_id_html').html(result.roles[0].nama_roles);
                    $('.nama_profile_html').html(result.profile.nama_profile);
                    $('.email_profile_html').html(result.profile.email_profile);
                    $('.nohp_profile_html').html(result.profile.nohp_profile);
                    $('.jenis_kelamin_profile_html').html(jenisKelamin);
                    $('.alamat_profile_html').html(result.profile.alamat_profile);
                    let linkGambarHtml =
                        `${root}storage/upload/profile/${result.profile.gambar_profile}`;
                    $('#load_image_profile_html').html(`
                    <a class="photoviewer" href="${linkGambarHtml}" data-gallery="photoviewer" data-title="${result.profile.gambar_profile}">
                        <img class="img-thumbnail" class="w-25" src="${linkGambarHtml}"></img>    
                    </a>
                    `);
                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })
        }


        let owl = $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
            }
        })

        function resetForm(attribute = null) {
            $('.form-submit').trigger("reset");
            owl.trigger('to.owl.carousel', 0)

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

                        $('#modalForm').modal('hide');
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
                        if (responseJSON.result != null) {
                            Swal.fire({
                                icon: 'info',
                                title: 'Info',
                                text: 'Perhatikan kembali form anda dengan benar',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            let outputResult = responseJSON.result;
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




        owl.owlCarousel();
        // Go to the next item
        $('.customNextBtn').click(function() {
            owl.trigger('next.owl.carousel');
        })
        // Go to the previous item
        $('.customPrevBtn').click(function() {
            // With optional speed parameter
            // Parameters has to be in square bracket '[]'
            owl.trigger('prev.owl.carousel', [300]);
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
