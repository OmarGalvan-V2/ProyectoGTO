<script>
$(function() {
    // Esta función se ejecuta cuando se hace clic en un elemento con la clase 'btn-Edicion'
    $('.btn-Edicion').on('click', function(e) {
        e.preventDefault(); // Previene el comportamiento predeterminado del enlace

        // Obtiene el ID del empleado desde el atributo 'data-id' del elemento clicado
        var empleadoID = $(this).data('id');

        // Realiza una solicitud AJAX al servidor
        $.ajax({
            url: '<?= base_url('CRUDEP/') ?>', // URL del servidor a la que se envía la solicitud
            type: 'POST', // Método de la solicitud POST
            data: datos, // Los datos que se envían al servidor (deberías definir la variable 'datos' previamente)
            success: function(response) {
                if (!response) {
                    // Si la respuesta del servidor indica que no existe el usuario, muestra un mensaje de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No existe este usuario'
                    })
                } else {
                    // Si la respuesta del servidor indica éxito, muestra un mensaje de éxito
                    Swal.fire({
                        title: 'El Usuario ha sido registrado correctamente!',
                        text: 'Click para continuar!',
                        icon: 'success'
                    })
                }
            }
        })
    })
})
</script>