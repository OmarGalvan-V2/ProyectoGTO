<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>JuventudEsGTO</title>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href=<?= base_url() . "CSS/InterfazUsuario.CSS" ?>>
<script src="https://kit.fontawesome.com/c575c56047.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

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

<style>
    .Contenedor-Nav {
        border: 3px solid cornflowerblue;
        margin-top: -89px;
    }

    .nav-link {
        display: flex;
        padding: .5rem 1rem;
        justify-content: space-evenly;
    }

    button {
        display: flex;
        padding-left: 10px;
        padding-top: 10px;
    }

    .fa fa-user-secret {
        padding: 10px;
    }
</style>

</head>

<body class="body">

    <!--Aqui Es El Registro De Los Empleados-->
    <div class="Contenedor-Nav">
        <!-- Button trigger modal -->
        <a class="btn btn-outline-primary menu-link nav-link Formulario" href=<?= base_url() . 'Welcome/AdministracionForm' ?>>
            Registrar Empleado y/o Usuario
        </a>
    </div>

    <!--Aqui Inicia La Tabla De Los Empleados-->
    <div class="prime-area">
        <div class="container-fluid">
            <div class="col-12 d-flex justify-content-center row">
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
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < count($EmpleadoJuventudes); $i++) { ?>
                                    <tr>
                                        <td><?= $EmpleadoJuventudes[$i]['ID'] ?></td>
                                        <td><?= $EmpleadoJuventudes[$i]['Paterno'] ?> <?= $EmpleadoJuventudes[$i]['Materno'] ?> <?= $EmpleadoJuventudes[$i]['Nombre'] ?></td>
                                        <td><?= $EmpleadoJuventudes[$i]['Correo'] ?></td>
                                        <td><?= $EmpleadoJuventudes[$i]['PuestoLaboral'] ?></td>
                                        <td><?= $EmpleadoJuventudes[$i]['AreaLaboral'] ?></td>
                                        <td><a  class="btn btn-primary" href=<?= base_url() . "Welcome/EditarUsuario?id=" . $EmpleadoJuventudes[$i]['ID']  ?>><i class="fa fa-user-secret" aria-hidden="true"></i></a></td>
                                        <td><button type="button" class="btn btn-danger"><i class="fa fa-user-times" aria-hidden="true"></i></button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>