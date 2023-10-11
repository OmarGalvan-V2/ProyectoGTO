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
<link rel="shortcut icon" href=<?= base_url("img/impulso.ico")?>>


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
                        <i class="material-icons">&#xe87c;</i>
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
                        <i class="material-icons">&#xe87c;</i>
                        <input type="text" name="Social" class="form-control" id="Social" placeholder="Social" value="<?= $Convcountry['data'][0]['Social'] ?>">
                    </div>
                </div>

                <br>

                <div class="botones">
                    <!-- Botón para Editar El Texto -->
                    <button class="btn btn-primary" id='Enviar'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                        </svg>
                        Actualizar Datos
                    </button>

                    <!-- Enlace para cancelar el registro -->
                    <a class="btn btn-danger" href=<?= base_url() . "Welcome/AdministracionMapi" ?> role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill-slash" viewBox="0 0 16 16">
                            <path d="M13.879 10.414a2.501 2.501 0 0 0-3.465 3.465l3.465-3.465Zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465Zm-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                        </svg>
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