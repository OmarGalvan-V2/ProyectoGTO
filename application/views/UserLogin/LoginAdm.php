<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JuventudEsGto</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href=<?= base_url()."CSS/interfazlogin.css"?>>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body class="body col-12 d-flex justify-content-center">

    <div class='Sign-up'>

        <img class='img' src=<?= base_url() . "/img/04.png" ?>>

        <p class=" pSession">Bienvenido Administador</p>

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
<?php $this->load->view('UserLogin/UserLogin_js')?>

</html>