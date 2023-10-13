<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function actualizar(data) {
        // Obtener el ID y el estado actual del checkbox

        let id = data.id;
        let estatus = data.checked;


        // Convertir el estado del checkbox a un valor numérico (1 o 0)
        if (estatus === true) {
            estatus = 1;
        } else {
            estatus = 0;
        }

        // Realizar una solicitud AJAX para actualizar el estado del Pais
        $.ajax({
            url: '<?= base_url() . 'Session/CambiandoEstadoPais' ?>',
            type: 'POST',
            data: {
                IDPais: id, // ID del Pais
                Status: estatus // Nuevo estado (1 para habilitado, 0 para deshabilitado)
            },
            success: function(response) {
                console.log(response)
                if (!response) {

                    // Mostrar una alerta de error si la respuesta indica un problema
                    Swal.fire({
                        icon: 'success',
                        title: 'El pais ha sido habilitado y/o inhabilitado correctamente',
                        text: 'Click para continuar!',
                    }).then(() => {
                        window.location.href =
                            'http://localhost/ProyectoGTO/Welcome/AdministracionMapi';
                    });
                } else {
                    // Mostrar una alerta de éxito si la actualización se realiza correctamente
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El pais no existe o ya está habilitado!',
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