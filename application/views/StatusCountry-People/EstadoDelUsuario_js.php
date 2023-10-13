<script>
    function actualizar(ID) {
        // Obtener el ID y el estado actual del checkbox
        let id = ID.id;
        let estatus = ID.checked;

        // Convertir el estado del checkbox a un valor numérico (1 o 0)
        if (estatus === true) {
            estatus = 1;
        } else {
            estatus = 0;
        }

        // Realizar una solicitud AJAX para actualizar el estado del usuario
        $.ajax({
            url: '<?= base_url() . 'Session/CambiandoEstadoPersonal' ?>',
            type: 'POST',
            data: {
                ID: id, // ID del usuario
                Status: estatus // Nuevo estado (1 para habilitado, 0 para deshabilitado)
            },
            success: function(response) {
                console.log(response)
                if (!response) {
                    // Mostrar una alerta de error si la respuesta indica un problema
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Este usuario no existe o ya está habilitado!',
                    });
                } else {
                    // Mostrar una alerta de éxito si la actualización se realiza correctamente
                    Swal.fire({
                        icon: 'success',
                        title: 'El usuario ha sido actualizado correctamente',
                        text: 'Click para continuar!',
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log("Error en la solicitud AJAX:");
                console.log("Estado: " + status);
                console.log("Error: " + error);
            }
        });
    }
</script>