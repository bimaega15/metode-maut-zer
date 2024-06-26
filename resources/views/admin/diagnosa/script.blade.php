<script>
    $(document).ready(function(e) {
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
            let current = $(this).data('current');
            let value = $('.item-step[data-step="' + current + '"] .bobot_user').val();
            if (value != '' && value != null) {
                Swal.fire({
                    title: 'Confirmation',
                    text: "Apakah anda yakin ingin konfirmasi, form konsultasi anda ?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, yakin'
                }).then((result) => {
                    if (result.isConfirmed) {
                        onSubmit();
                        $('.form-submit').submit();
                    }
                })
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Info!',
                    text: 'Pastikan anda telah mengisi tingkat gejala',
                })
            }
        })

        function onSubmit() {
            let data = {};
            let penyakit_id = $('.penyakit_id').val();
            let pushGejala = [];
            let pushBobotUser = [];
            let getGejala = $('.item-step .bobot_user');
            $.each(getGejala, function(i, v) {
                let value = $(this).val();
                let gejalaPenyakitId = $(this).data('gejala_penyakit_id');

                pushGejala.push(gejalaPenyakitId);
                pushBobotUser.push(value);
            })
            let getPushGejala = pushGejala.join(',');
            let getPushBobot = pushBobotUser.join(',');

            data.penyakit_id = penyakit_id;
            data.bobot_user_id = getPushBobot;
            data.gejala_id = getPushGejala;

            $('.gejala_id_konsultasi').val(data.gejala_id);
            $('.penyakit_id_konsultasi').val(data.penyakit_id);
            $('.bobot_user_id_konsultasi').val(data.bobot_user_id);
        }

        // $(document).on('submit', '.form-submit', function(e) {
        //     e.preventDefault();
        // })

        $(document).on('click', '.btn-select-penyakit', function(e) {
            e.preventDefault();
            let penyakit_id = $('.penyakit_id').val();
            $('.penyakit_id option').attr('selected', false);
            $('.penyakit_id option[value="' + penyakit_id + '"]').attr('selected', true);

            $.ajax({
                url: "{{ url('/admin/diagnosa/selectGejalaPenyakit') }}",
                type: 'get',
                data: {
                    penyakit_id
                },
                dataType: 'json',
                success: function(data) {
                    if (data.status == 200) {
                        const {
                            result: {
                                gejalaPenyakit,
                                bobotUser,
                                clean
                            }
                        } = data;

                        resetForm(clean);

                        let output = ``;
                        let lengthGejalaPenyakit = gejalaPenyakit.length - 1;
                        gejalaPenyakit.map((v, i) => {
                            let buttonStep = ``;
                            if (i == 0) {
                                buttonStep = `
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-outline-dark m-b-xs btn-step-gejala" data-step="${i-1}" data-current="${i}" data-tipe="prev"><i class="fa-solid fa-arrow-left"></i> Sebelumnya
                                </button>
                                <button type="button" class="btn btn-outline-dark m-b-xs btn-step-gejala" data-step="${i+1}" data-current="${i}" data-tipe="next"> Selanjutnya <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                            `;
                            }

                            if (i > 0 && i < lengthGejalaPenyakit) {
                                buttonStep = `
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-dark m-b-xs btn-step-gejala" data-step="${i-1}" data-current="${i}" data-tipe="prev"><i class="fa-solid fa-arrow-left"></i> Sebelumnya
                                    </button>
                                    <button type="button" class="btn btn-outline-dark m-b-xs btn-step-gejala" data-step="${i+1}" data-current="${i}" data-tipe="next"> Selanjutnya <i class="fa-solid fa-arrow-right"></i>
                                </button>
                                </div>
                                `;
                            }
                            if (lengthGejalaPenyakit == i) {
                                buttonStep = `
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-dark m-b-xs btn-step-gejala" data-step="${i-1}" data-current="${i}" data-tipe="prev"><i class="fa-solid fa-arrow-left"></i> Sebelumnya
                                    </button>
                                    <button type="submit" class="btn btn-outline-primary m-b-xs btn-submit" data-step="${i-1}" data-current="${i}">
                                        Submit <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </div>
                                `;
                            }
                            let initialClassNone = i == 0 ? '' : 'd-none';
                            output += `
                            <div class="mb-3 item-step ${initialClassNone}" data-step="${i}">
                                <label for="bobot_user" class="form-label">${v.gejala.kode_gejala} | ${v.gejala.nama_gejala}</label>
                                <select class="form-control bobot_user" id="bobot_user" data-gejala_penyakit_id="${v.id}">
                                    <option value="">-- Select --</option>`
                            bobotUser.map((vBobot, iBobot) => {
                                output +=
                                    `<option value="${vBobot.id}">${vBobot.bobot_user}</option>`;
                            })
                            output += `
                                </select>
                                <hr>
                                ${buttonStep}
                            </div>
                            `;
                        })

                        $('#load_gejala_penyakit').html(output);
                        $('#form-group-penyakit').addClass('d-none');
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
            })
        })

        $(document).on('click', '.btn-step-gejala', function(e) {
            e.preventDefault();

            let step = $(this).data('step');
            let current = $(this).data('current');

            if (step == -1) {
                $('.item-step').addClass('d-none');
                $('#form-group-penyakit').removeClass('d-none');
            } else {
                let value = null;
                $('#form-group-penyakit').addClass('d-none');

                let tipe = $(this).data('tipe');
                if (tipe == 'next') {
                    value = $('.item-step[data-step="' + current + '"] .bobot_user').val();
                    if (value != '' && value != null) {
                        $('.item-step').addClass('d-none');
                        $('.item-step[data-step="' + step + '"]').removeClass('d-none');
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Info!',
                            text: 'Pastikan anda telah mengisi tingkat gejala',
                        })
                    }
                } else {
                    $('.item-step').addClass('d-none');
                    $('.item-step[data-step="' + step + '"]').removeClass('d-none');
                }
            }
        })
    })
</script>
