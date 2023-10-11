<script>
$(document).ready(function() {
    // Cuando el documento esté listo, se ejecutará esta función.

    $('#FormP').submit(function(e) {
        // Se previene el envío del formulario por defecto.
        e.preventDefault();

        // Serializa los datos del formulario en un arreglo.
        var datos = $(this).serializeArray();

        $.ajax({
            url: '<?= base_url('CRUDEP/ActualizarEmp') ?>',
            // URL a la que se enviarán los datos del formulario mediante AJAX.
            type: 'post',
            data: datos,
            dataType: 'json',
            success: function(response) {
                // Esta función se ejecuta cuando la solicitud AJAX tiene éxito.
                if (!response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Favor De Llenar los datos solicitados'
                    });

                } else {
                    Swal.fire({
                        title: 'El Usuario ha sido actualizado correctamente!',
                        text: 'Click para continuar!',
                        icon: 'success'
                    }).then(() => {
                        window.location.href =
                            'http://localhost/ProyectoGTO/Welcome/AdministracionUsuario';
                    });
                }
            },
            error: function(response) {
            }
        });
    });
});

</script>