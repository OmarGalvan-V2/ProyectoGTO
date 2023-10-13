<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título de la página -->
    <title>JuventudEsGto</title>

     <!-- Icono de la página (favicon) -->
     <link rel="shortcut icon" href="<?= base_url().'img/impulso.ico' ?>">

    <!-- Enlace al archivo de estilos CSS -->
    <link rel="stylesheet" href="<?= base_url() . "CSS/InterfazBienvenida.css" ?>">

    <!-- Referencia al kit de iconos Font Awesome -->
    <script src="https://kit.fontawesome.com/c575c56047.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">




</head>


<body class="body">

    <div class="container">
        <div class="row">
            <div class='Sign-up col-lg-6 col-sm-12 ml-auto mr-auto' style="margin-top: -80px;">
                <img class='img' src="<?= base_url() . "/img/04.png" ?>">
                <center class="pSession"><b>Bienvenido <?php echo $_SESSION['datos'][0]['Usuario']; ?></b></center>     
            </div>
        </div>
    </div>

</body>

</html>