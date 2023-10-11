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



</head>


<body class="body">

    <div class='Sign-up' style="margin-top: -80px;">

        <img class='img' src="<?= base_url() . "/img/04.png" ?>">

        <center class="pSession"><b>Bienvenido <?php echo $_SESSION['datos'][0]['Usuario']; ?></b></center>

    </div>
</body>

</html>