<script>
    $(function() {
        $('.btn-Edicion').on('click', function(e) {
            e.preventDefault();
            var empleadoID = $(this).data('id');
            $.ajax({
                URL: <?= base_url('CRUDEP/')?>,
                Type: 'POST',
                data: datos,
                success: function(response) {
                    if (!response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No existe este usuario'
                        })
                    } else {
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