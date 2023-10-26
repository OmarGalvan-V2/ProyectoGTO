<!DOCTYPE html>
<html lang="es-MX">

<head>
    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Título de la página -->
    <title>JuventudEsGto</title>
    
    <!-- Inclusión de jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    
    <!-- Inclusión de Bootstrap CSS desde CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <!-- Enlace al archivo de estilos CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url()."CSS/interfazlogin.css" ?>">
    
    <!-- Inclusión de SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <!-- Icono de la página (favicon) -->
    <link rel="shortcut icon" href="<?= base_url().'img/impulso.ico' ?>">
</head>

<body class="body col-12 d-flex justify-content-center">
    <!-- Contenido principal de la página -->
    <div class='Sign-up'>
        <!-- Imagen -->
        <img class='img' src="<?= base_url() . "/img/04.png" ?>">
        
        <!-- Mensaje de bienvenida -->
        <p class="pSession">Acceso no autorizado!</p>
        <p class="pSession">Usted intenta acceder con una cuenta restringida o no registrada!</p>
    </div>
</body>

</html>
