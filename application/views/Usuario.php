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
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://kit.fontawesome.com/c575c56047.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
        $(function() {
            $.validator.addMethod("noNumbers", function(value, element) {
                return this.optional(element) || /^[^\d]+$/.test(value);
            }, "No se permiten números en este campo");

            let pet = $('.modal.#FormP').attr('action');
            let met = $('.modal.#FormP').attr('method');
            $('#FormR').validate({
                rules: {
                    Nombre: {
                        required: true,
                        noNumbers: true
                    },
                    Paterno: {
                        required: true,
                        noNumbers: true
                    },
                    Materno: {
                        required: true,
                        noNumbers: true,
                    }
                },
                messages: {
                    Nombre: {
                        required: 'Por favor, ingresa el Nombre',
                        noNumbers: 'Por favor, No ingresar numeros en este campo'
                    },
                    Paterno: {
                        required: 'Por favor, ingresa el Apellido Paterno',
                        noNumbers: 'Por favor, No ingresar numeros en este campo'
                    },
                    Materno: {
                        required: 'Por favor, ingresa un Apellido Materno',
                        noNumbers: 'Por favor, No ingresar numeros en este campo'
                    }
                },
                errorPlacement: function(error, element) {
                    // Muestra los mensajes de error debajo de los campos correspondientes
                    error.appendTo(element.next('.invalid-feedback'));
                },
                highlight: function(element, errorClass, validClass) {
                    // Agrega la clase 'is-invalid' al campo de entrada si hay un error
                    $(element).addClass('is-invalid');
                },
                submitHandler: function(form) {
                    // Envía el formulario con AJAX si pasa la validación
                    $.ajax({
                        url: pet,
                        type: met,
                        data: $(form).serialize(),
                        success: function(resp) {
                            if (resp == 'Error') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Favor De Llenar los datos solicitados'
                                })
                            } else {
                                Swal.fire({
                                    title: 'El empleado ha sido registrado correctamente!',
                                    text: 'Click para continuar!',
                                    icon: 'success'
                                }).then(() => {
                                    window.location.href = 'http://localhost/ProyectoGTO/Welcome/Administracion'
                                });
                            }
                        }
                    });
                }
            });
        });
</script>




<style>
    .Contenedor-Nav {
        border: 3px solid cornflowerblue;
        margin-top: -89px;
    }


    .Modal {
        width: 100%;
        display: flex;
        justify-content: center;
    }
</style>

</head>

<body class="body">

    <!--Aqui Es El Registro De Los Empleados-->
    <div class="Contenedor-Nav">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Registrar Empleado
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Registrar JuventudEsGTO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="FormP" action=<?= base_url() . "CRUDEP/InserccionEmpleados" ?> method="POST">
                                    <div class="form-row">
                                        <div class="col">
                                            <div style="display: flex;justify-content: center;align-items: center;"><i class="material-icons">&#xe87c;</i> <input type="text" name="Nombre" value="<?php echo set_value('Nombre'); ?>" class="form-control" class="Nombre" id="Nombre" placeholder="Nombre"></div>
                                            <small class="invalid-feedback"></small>
                                        </div>
                                        <div class="col">
                                            <div style="display: flex;justify-content: center;align-items: center;"><i class="material-icons">&#xe7fb;</i> <input type="text" class="form-control" name="Paterno" value="<?php echo set_value('Paterno'); ?>" class="Paterno" id="Paterno" placeholder="Apellido Paterno"></div>
                                            <small class="invalid-feedback"></small>
                                        </div>
                                        <div class="col">
                                            <div style="display: flex;justify-content: center;align-items: center;"><i class="material-icons">&#xe7fb;</i> <input type="text" class="form-control" name="Materno" value="<?php echo set_value('Materno'); ?>" class="Materno" id="Materno" placeholder="Apellido Materno"></div>
                                            <small class="invalid-feedback"></small>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="form-row">
                                        <div class="col">
                                            <div style="display: flex;justify-content: center;align-items: center;"><i class="class material-icons">&#xe0be;</i><input type="text" class="form-control" name="Correo" value="<?php echo set_value('Correo'); ?>" class="Correo" id="Correo" placeholder="Correo"></div>
                                        </div>

                                        <div class="col">
                                            <div style="display: flex;justify-content: center;align-items: center;"><i class="class material-icons"></i><input type="text" class="form-control" name="PuestoLaboral" class="PuestoLaboral" id="PuestoLaboral" value="<?php echo set_value('PuestoLaboral'); ?>" placeholder="Puesto Laboral"></div>
                                        </div>
                                        <div class="col">
                                            <div style="display: flex;justify-content: center;align-items: center;"><i class="class material-icons"></i><input type="text" class="form-control" name="AreaLaboral" class="AreaLaboral" value="<?php echo set_value('AreaLaboral'); ?>" id="AreaLaboral" placeholder="Area-[Laboral]"></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <br>

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
                                        <td></td>
                                        <td></td>
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