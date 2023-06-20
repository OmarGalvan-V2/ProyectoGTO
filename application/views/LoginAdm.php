<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JuventudEsGto</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href=<?= base_url() . "CSS/interfazlogin.css" ?>>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        
$(function() {
    let pet = $('#FormLogin').attr('action');
    let met = $('#FormLogin').attr('method');
    $('#FormLogin').on('submit', function(e) {
        e.preventDefault();
        let Usuario = $('#Usuario').val();
        let Password = $('#Password').val();
        if (Usuario.trim() == '' || Password.trim() == '') {
            // Si los campos están vacíos, muestra un mensaje de error al usuario
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, ingresa un usuario y contraseña',
            });
            return false;
        }
        $.ajax({
            url: pet,
            type: met,
            data: $('#FormLogin').serialize(),
            success: function(resp) {
                if (resp == "Error") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'La contraseña y/o usuario son incorrectos',
                    })
                } else {
                    Swal.fire({
                      title: 'Sesion Iniciada!',
                      text: 'Click para continuar!',
                      icon: 'success'
                    }).then(() => {
                      window.location.href = 'http://localhost/ProyectoGTO/Welcome/Administracion'
                    });
                  }
                  
            }
        })
    })
})

    </script>

    
</head>

<body class="body col-12 d-flex justify-content-center">

    <div class='Sign-up'>

        <img class='img' src=<?= base_url() . "/img/04.png" ?>>

        <p class="pSession">Bienvenido Administador</p>

        <form id="FormLogin" action=<?= base_url() . "Session/ValidandoDatos" ?> name="FormLogin" method="post">

            <div>
                <input id="Usuario" type="text" name="Usuario" placeholder="Nombre De Usuario">
            </div>

            <div>
                <input id="Password" type="password" name="Password" placeholder="Ingrese la contraseña">
            </div>

            <div>
                <button type="submit">Iniciar Sesión</button>
            </div>

        </form>

    </div>
</body>

</html>