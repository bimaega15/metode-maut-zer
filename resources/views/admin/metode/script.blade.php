<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            todayBtn: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy'
        });

        $('#tableHasilBagi').DataTable();
        $('#tableNormalisasi').DataTable();
        $('#tablePreferensi').DataTable();
        $('#tableRanking').DataTable();

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
                    if (data.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })

                        $('#modalForm').modal('hide');

                        const {
                            result
                        } = data;
                        resetForm(result);

                        let root = `{{ url('/') }}`;
                        let url = `${root}/admin/hasil`;
                        window.location.href = url;
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
    })
</script>
