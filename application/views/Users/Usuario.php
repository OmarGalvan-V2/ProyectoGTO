<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>JuventudEsGTO</title>


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/c575c56047.js" crossorigin="anonymous"></script>

<!-- jQuery Slim-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<!-- Estilos -->
<link rel="stylesheet" href="<?= base_url('CSS/InterfazUsuario.css') ?>">

<script>
    let table = new DataTable('#table');
    $(function() {
        $('#table').DataTable({
            "paging": true,
            "searching": true,
            "lengthMenu": [10, 25, 50],
            "order": [0, 'asc'],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json" // Cargar archivo de idioma en español
            }
        });
    })
</script>

</head>

<body class="body">
    <?php if ($_SESSION['datos'][0]['Rol'] == '1') : ?>
        <!--Aqui Es El Registro De Los Empleados-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6 ml-auto mr-auto" style="display: flex; justify-content: space-around; flex-direction: column;">
                    <a class="btn btn-primary" href="<?= base_url() ?>Welcome/AdministracionForm">
                        <i class="fa fa-user-plus"></i> Registrar Empleado y/o Usuario </a>
                <?php endif; ?>
                </div>
            </div>


            <!--Aqui Inicia La Tabla De Los Empleados-->
            <div class="row">
                <!--ml-auto: margen left: automatico-->
                <!--mr-auto: margen right: automatico-->
                <div class="col-sm-12 col-lg-6 ml-auto mr-auto">
                    <div class="alert alert-primary" role="alert" style="padding:.75rem">
                        <b>
                            <h1 style="font-size: 30px; text-align: center;">Administración de Usuario</h1>
                        </b>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--El overflow evita el desbordamiento de la tabla-->
                <div class="col-12" style="overflow-x: auto;">
                    <table class="table table-striped" id="table">
                        <thead style="background-color: #1A237E !important; color: white">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Puesto Laboral</th>
                                <th scope="col">Area Laboral</th>
                                <?php if ($_SESSION['datos'][0]['Rol'] == '1') : ?>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Status</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($EmpleadoJuventudes); $i++) { ?>
                                <tr>
                                    <td><?= $EmpleadoJuventudes[$i]['ID'] ?></td>
                                    <td><?= $EmpleadoJuventudes[$i]['Paterno'] ?>
                                        <?= $EmpleadoJuventudes[$i]['Materno'] ?>
                                        <?= $EmpleadoJuventudes[$i]['Nombre'] ?></td>
                                    <td><?= $EmpleadoJuventudes[$i]['Correo'] ?></td>
                                    <td><?= $EmpleadoJuventudes[$i]['PuestoLaboral'] ?></td>
                                    <td><?= $EmpleadoJuventudes[$i]['AreaLaboral'] ?></td>
                                    <?php if ($_SESSION['datos'][0]['Rol'] == '1') : ?>
                                        <td><a class="btn btn-primary" href=<?= base_url() . "Welcome/EditarUsuario?id=" . $EmpleadoJuventudes[$i]['ID']  ?>><i class="fa fa-user-secret" aria-hidden="true"></i></a></td>
                                        <td>
                                            <div class="switch-container">
                                                <label class="switch">
                                                    <?php if ($EmpleadoJuventudes[$i]['Status']) { ?>
                                                        <input type="checkbox" checked id="<?= $EmpleadoJuventudes[$i]['ID'] ?> " onclick="actualizar(this)">
                                                        <span class=" slider round"></span>
                                                    <?php } else { ?>
                                                        <input type="checkbox" id="<?= $EmpleadoJuventudes[$i]['ID'] ?> " onclick="actualizar(this)">
                                                        <span class=" slider round"></span>
                                                    <?php } ?>
                                                </label>
                                            </div>
                                        </td>
                                    <?php else : ?>
                                    <?php endif; ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php $this->load->view('Users/Usuario_js') ?>
        <?php $this->load->view('StatusCountry-People/EstadoDelUsuario_js') ?>
</body>

</html>