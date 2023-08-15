<script>
    $(document).ready(function() {

        $('#FormP').submit(function(e) {
            e.preventDefault()
            var datos = $(this).serializeArray()
            $.ajax({
                url: '<?= base_url('CRUDEP/ActualizarEmp') ?>',
                type: 'post',
                data: datos,
                dataType: 'json',
                success: function(response) {
                    console.log(response);

                    if (!response.ok) {
                        Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Favor De Llenar los datos solicitados'
                                })
                        showFormValidationErrors(response.Errors)
                    } else {
                        Swal.fire({
                                    title: 'El Usuario ha sido actualizado correctamente!',
                                    text: 'Click para continuar!',
                                    icon: 'success'
                                }).then(() => {
                                    window.location.href = 'http://localhost/ProyectoGTO/Welcome/AdministracionUsuario'
                                });
                    }

                },
                error: function(response) {

                }
            });
        })
        //})
    })

    function showFormValidationErrors(arrErrors) {
        try {
            var a = 0;
            $.each(arrErrors, function(index, error) {
                var indx = index.replaceAll("[]", "");
                console.log(indx);
                if (error && error.length > 0) {
                    a++;
                    var $elem = $('[name="' + index + '"]');
                    /*if (a == Object.keys(arrErrors).length) {
                     $elem.focus();
                     }*/
                    if ($elem.hasClass('selectpicker')) {
                        $elem.parent().addClass('is-invalid');
                    } else {
                        $elem.addClass('is-invalid');
                    }
                    if ($elem.hasClass('selectpicker')) {
                        $elem.parent().parent().find('div.invalid-feedback').remove();
                        $elem.parent().parent().append('<small class="invalid-feedback">' + error + '</small>');
                    } else if ($elem.hasClass('ss-select-mul')) {
                        $("#" + indx + "_Help").html(error);
                        $("#" + indx).siblings(".ss-main").children(".ss-multi-selected").addClass("border rounded border-danger");
                    } else if (indx.substring(0, 3) === 'RAD') {
                        for (var i = 0; i < $elem.length; i++) {
                            $elem.parents(".centered_td").addClass("bg-danger");
                        }
                    } else {
                        $elem.parent().find('div.invalid-feedback').remove();
                        $elem.parent().append('<small class="invalid-feedback">' + error + '</small>');
                    }
                }
            });
            clearFormErrors();
        } catch (err) {
            console.log('error in showFormValidationErrors');
            console.log(err);
            return false;
        }
    }

    function clearFormErrors() {
        $('.is-invalid').on('focusout', function(e) {
            if ($(this).val()) {
                var elemName = $(this).attr('name');
                var $elem = $('[name="' + elemName + '"]');
                $elem.removeClass('is-invalid');
                $elem.parent().find('small.invalid-feedback').remove();
            } else {
                $(this).removeClass('is-invalid');
                $(this).parent().find('.invalid-feedback').remove();
            }
        });
    }
</script>