<script>
    $(document).ready(function() {

        $('#FormP').submit(function(e) {
            e.preventDefault()
            let datos = $(this).serializeArray()
            console.log(datos); // Verifica los datos antes de enviar la solicitud
            $.ajax({
                url: '<?= base_url('CRUDEP/ActualizarText') ?>',
                type: 'post',
                data: datos,
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    if (!response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Favor De Llenar los datos solicitados'
                        })
                    } else {
                        Swal.fire({
                            title: 'El Pais ha sido actualizado correctamente!',
                            text: 'Click para continuar!',
                            icon: 'success'
                        }).then(() => {
                            window.location.href = 'http://localhost/ProyectoGTO/Welcome/AdministracionMapi'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error en la solicitud AJAX:");
                    console.log("Estado: " + status);
                    console.log("Error: " + error);
                }
            });
        })
        //})
    })
</script>