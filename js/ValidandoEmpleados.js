       
        $(function() {
            let pet = $('#FormP').attr('action');
            let met = $('#FormP').attr('method');
            $('#FormP').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: pet,
                    type: met,
                    data: $('#FormP').serialize(),
                    success: function(resp) {
                        if (resp == "Error") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Favor de llenar los datos solicitados',
                            })
                        } else {
                            Swal.fire({
                              title: 'Usuario Registrado!',
                              text: 'Click para continuar!',
                              icon: 'success'
                            }).then(() => {
                              window.location.href = 'http://localhost/ProyectoGTO/Welcome/AdministracionUsuario'
                            });
                          }
                          
                    }
                })
            })
        })
        