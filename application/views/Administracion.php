<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JuventudEsGto</title>
    <link rel="stylesheet" href=<?= base_url() . "CSS/InterfazBienvenida.css" ?>>
    <script src="https://kit.fontawesome.com/c575c56047.js" crossorigin="anonymous"></script>



</head>


<body class="body">

    <div class='Sign-up' style="margin-top: -80px;">

        <img class='img' src=<?= base_url() . "/img/04.png" ?>>

        <center class="pSession"><b>Bienvenido <?php echo $_SESSION['datos'][0]['Usuario']; ?> </b></center>


        </form>

    </div>

</body>

</html>