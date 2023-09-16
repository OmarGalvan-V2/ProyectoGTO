<script>
$(function() {
    $('#toggle-switch').change(function(e) {
        e.preventDefault();
        var idpais = $(this).data('IDPais');
        var status = $(this).prop('checked') ? 1 : 0;

        $.ajax({
            url: '<?= base_url().'Session/CambiandoEstadoPais'?>',
            type: 'POST',
            data: {
                IDPais: idpais,
                Status: status
            },
            success: function(response) {
                if (!response) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Este pais no existe o ya esta habilitado!',
                    })
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'El pais ha sido habilitado correctamente',
                        text: 'Click para continuar!',
                    })
                }
            }
        });
    });
});
</script>