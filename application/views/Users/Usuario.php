<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>JuventudEsGTO</title>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/c575c56047.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href=<?= base_url('CSS/InterfazUsuario.css') ?>>



<script>
let table = new DataTable('#table');
$(function() {
    $('#table').DataTable({
        "paging": true,
        "searching": true,
        "lengthMenu": [10, 25, 50],
        "order": [0, 'asc'],
    });
})
</script>

</head>

<body class="body">
    <?php if ($_SESSION['datos'][0]['Rol'] == '1'): ?>
    <!--Aqui Es El Registro De Los Empleados-->
    <div class="contenedor-botones">
        <a class="btn btn-primary menu-link nav-link formulario" href="<?= base_url() ?>Welcome/AdministracionForm">
            Registrar Empleado y/o Usuario
        </a>
        <?php endif;?>
    </div>

    <!--Aqui Inicia La Tabla De Los Empleados-->
    <div class="prime-area">
        <div class="container-fluid">
            <div class="col-12 d-flex justify-content-center row" style="transform: translate(0px, -80px);">
                <div class="col-12 d-flex justify-content-center">
                    <div class="alert alert-primary col-6" role="alert">
                        <center>
                            <h1><b>Información De Usuarios </b></h1>
                        </center>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-center mt-10">
                    <div class="col-12">
                        <table class="table table-striped" id="table">
                            <thead style="background-color: #1A237E !important; color: white">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Puesto Laboral</th>
                                    <th scope="col">Area Laboral</th>
                                    <?php if ($_SESSION['datos'][0]['Rol'] == '1'): ?>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Status</th>
                                    <?php endif;?>
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
                                    <?php if ($_SESSION['datos'][0]['Rol'] == '1'): ?>
                                    <td><a class="btn btn-primary"
                                            href=<?= base_url() . "Welcome/EditarUsuario?id=" . $EmpleadoJuventudes[$i]['ID']  ?>><i
                                                class="fa fa-user-secret" aria-hidden="true"></i></a></td>
                                    <td>
                                        <div class="switch-container">
                                            <label class="switch">
                                                <?php if($EmpleadoJuventudes[$i]['Status']){?>
                                                <input type="checkbox" checked id="<?= $EmpleadoJuventudes[$i]['ID']?> "
                                                    onclick="actualizar(this)">
                                                <span class=" slider round"></span>
                                                <?php }else{?>
                                                <input type="checkbox" id="<?= $EmpleadoJuventudes[$i]['ID']?> "
                                                    onclick="actualizar(this)">
                                                <span class=" slider round"></span>
                                                <?php } ?>
                                            </label>
                                        </div>
                                    </td>
                                    <?php else:?>
                                    <?php endif;?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('Users/Usuario_js')?>
    <?php $this->load->view('StatusCountry-People/EstadoDelUsuario_js')?>
</body>

</html>