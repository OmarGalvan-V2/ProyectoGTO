<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pais</title>
</head>


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/c575c56047.js" crossorigin="anonymous"></script>

<!-- Custom CSS -->
<link rel="stylesheet" href="<?= base_url() . "CSS/InterfazUsuario.css" ?>">
<link rel="stylesheet" href="<?= base_url() . "CSS/InterfazFormularios.css" ?>">

<!-- Google Fonts Iconos -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!--Icono de Juventudes-->
<link rel="shortcut icon" href=<?= base_url("img/impulso.ico") ?>>


</head>

<body class="body">

    <body class="body">
        <div id="Carta" class="card">
            <h1 class="titulo">Actualizacion Del Texto</h1>
            <!-- Formulario de Actualización -->
            <form id="FormP">
                <div class="form-group">
                    <div class="input-icon">
                        <input type="hidden" name="IDPais" value="<?= $Convcountry['data'][0]['IDPais'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <input type="text" name="Academico" class="form-control" id="Academico" placeholder="Academico" value="<?= $Convcountry['data'][0]['Academico'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-icon">
                        <i class="material-icons">&#xe87c;</i>
                        <input type="text" name="Profesional" class="form-control" id="Profesional" placeholder="Profesional" value="<?= $Convcountry['data'][0]['Profesional'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <input type="text" name="Social" class="form-control" id="Social" placeholder="Social" value="<?= $Convcountry['data'][0]['Social'] ?>">
                    </div>
                </div>

                <br>

                <div class="botones">
                    <!-- Botón para Editar El Texto -->
                    <button class="btn btn-primary" id='Enviar'>
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        Actualizar Datos
                    </button>


                    <!-- Enlace para cancelar el registro -->
                    <a class="btn btn-danger" href=<?= base_url() . "Welcome/AdministracionMapi" ?> role="button">
                        <i class="fa fa-times" aria-hidden="true"></i>
                        Cancelar
                    </a>

                </div>
            </form>
        </div>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

        <!-- JavaScript -->
        <?php $this->load->view('CountryTextEdit/EditarTexto_js')  ?>

    </body>

</html>