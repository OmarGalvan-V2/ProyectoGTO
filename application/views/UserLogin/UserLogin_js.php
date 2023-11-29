<script>
    $(function () {  
      $('#FormLogin').submit(function (e) {  
        e.preventDefault(); // Evita que se envíe el formulario por defecto
        $.ajax({
          url: $(this).attr('action'),
          type: 'post',
          data: $(this).serialize(),
          success: function (resp) {
            if (!resp) {
              Swal.fire({
                title: '¡Inicio Exitoso!',
                text: 'Bienvenido al Directorio Administrador',
                icon: 'success'
              }).then(() => {
              window.location.href = 'http://localhost/ProyectoGTO/Welcome/Administracion'
            });
            }else{
              Swal.fire({
                title: 'Error de autenticación',
                text: 'Verifique usuario y/o contraseña',
                icon: 'error'
              })
            }
          }
        })
      })
    })
  </script>
