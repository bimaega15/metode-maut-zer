<script>
    $(document).ready(function() {
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
                            html: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then((res) => {
                            let url = `{{ url('/') }}`;
                            window.location.href = url + '/login';
                        })

                        const {
                            result
                        } = data;
                        resetForm(result);
                    }

                    if (data.status == 400) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            html: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })

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
                    }
                },
                complete: function() {
                    $('.btn-submit').attr('disabled', false);
                }
            });
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

    })
</script>
