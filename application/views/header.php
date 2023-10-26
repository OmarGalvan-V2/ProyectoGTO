<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href=<?= base_url() . "slide/css/swiper.min.css" ?>>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href=<?= base_url() . "libs/fontawesome/css/fontawesome.css" ?> rel="stylesheet">
    <link href=<?= base_url() . "libs/fontawesome/css/brands.css" ?> rel="stylesheet">
    <link href=<?= base_url() . "libs/fontawesome/css/solid.css" ?> rel="stylesheet">
    <link rel="stylesheet" media="screen" href=<?= base_url('style/style.css') ?>>
    <link rel="stylesheet" media="screen" href=<?= base_url('style/sfia.css') ?>>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <style>
        @media (max-device-width: 480px) {
            .navbar-header a {
                width: 198px;
                background-size: 154px auto !important;
            }
        }
    </style>

    <!-- Traductor -->
    <style type="text/css">
        <!--
        a.gflag {
            vertical-align: middle;
            font-size: 32px;
            padding: 1px 0;
            background-repeat: no-repeat;
            background-image: url(//gtranslate.net/flags/32.png);
        }

        a.gflag img {
            border: 0;
        }

        a.gflag:hover {
            background-image: url(//gtranslate.net/flags/32a.png);
        }

        #goog-gt-tt {
            display: none !important;
        }

        .goog-te-banner-frame {
            display: none !important;
        }

        .goog-te-menu-value:hover {
            text-decoration: none !important;
        }

        body {
            top: 0 !important;
        }

        #google_translate_element2 {
            display: none !important;
        }

        .nav-item:hover {
            background-color: transparent;
        }


        #nav-item:hover {
            background-color: transparent;
        }
        -->
    </style>

    <title>JuventudEsGto</title>
    <link rel="shortcut icon" href="impulso.ico">



</head>

<body>
    <div class="wrapper">
        <!-- GTranslate: https://gtranslate.io/ -->
        <div id="google_translate_element2"></div>

        <!-- HEADER -->
        <header class="masthead" role="banner">
            <!-- Top bar -->
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <!-- CONTACT -->
                        <div class="hidden-xs col-sm-6">
                            <ul class="contact-options">

                                <li class="phone">
                                    <a href="http://sgo.juventudesgto.com/Directorio/Directorio.html" title="Contacto" target="_blank"> 477 710 34 00</a>

                                </li>

                                <div class="rro"></div>
                                <li class="phone">
                                    <a href="http://sgo.juventudesgto.com/Directorio/Directorio.html" title="Contacto" target="_blank">DIRECTORIO</a>
                                </li>

                            </ul>
                        </div>
                        <!-- /CONTACT -->
                        <!-- SOCIAL -->
                        <div class="col-xs-12 col-sm-6">
                            <div class="social xs-center">

                                <a href="https://www.instagram.com/juventudgto/" title="Instagram" target="_blank"><span class="fab fa-instagram"></span></a>
                                <a href="https://www.facebook.com/JuventudEsGto" title="Facebook" target="_blank"><span class="fab fa-facebook-square"></span></a>
                                <a href="https://twitter.com/JuventudEsGto" title="Twitter" target="_blank"><span class="fab fa-twitter"></span></a>
                                <a href="https://www.youtube.com/channel/UCNxjn155hP-SHqu1m4C4w4w" title="YouTube" target="_blank"><span class="fab fa-youtube"></span></a>
                                <a href="https://www.tiktok.com/@juventudesgto?_d=secCgYIASAHKAESMgowwNecevOXTNFs1MrRbUWyACd%2F8VbwjJSj7X0VbtSgMB8Hk6CSAz4JM6iFy3fkAhmMGgA%3D&language=es&sec_uid=MS4wLjABAAAAIvg_1QW5XcHcnWaU215krcSoYRS32VH140AvOjufnSdAgfinJVU1lo4yH5UGZANK&sec_user_id=MS4wLjABAAAAIvg_1QW5XcHcnWaU215krcSoYRS32VH140AvOjufnSdAgfinJVU1lo4yH5UGZANK&share_app_id=1233&share_author_id=6902169995460314113&share_link_id=1ef3c474-ff07-49b6-9446-456a68e369d6&timestamp=1625587897&u_code=dfm08lg625c7a6&user_id=6902169995460314113&utm_campaign=client_share&utm_medium=android&utm_source=whatsapp&source=h5_m&_r=1" title="TikTok" target="_blank"><span class="fab fa-tiktok"></span></a>
                                <div class="rro lnh"></div>
                            </div>
                        </div>
                        <!-- /SOCIAL -->
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 col-sm-12">
                        <div class="navbar-header">
                            <a href="#"></a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-sm-12">
                        <ul class="nav justify-content-end">
                            <?php if (isset($_SESSION) > 0) : ?>
                                <?php if ($_SESSION['datos'][0]['Status'] == '1' && $_SESSION['datos'][0]['Rol'] == '1') { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href=<?= base_url() . "Welcome/Administracion" ?>>
                                            <span class="fas fa-home"></span> Inicio
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=<?= base_url() . "Welcome/AdministracionUsuario" ?>>
                                            <span class="fas fa-user"></span> Usuario
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=<?= base_url() . "Welcome/AdministracionMapi" ?>>
                                            <span class="fas fa-globe"></span> Convocatoria Internacional
                                        </a>
                                    </li>
                                    <li class="nav-item no-hover-background">
                                        <a class="nav-link" href=<?= base_url() . "Session/CerrarSesion" ?>>
                                            <span class="fas fa-sign-out-alt"></span> Cerrar Sesión
                                        </a>
                                    </li>
                                <?php } elseif (($_SESSION['datos'][0]['Rol'] == 2) && $_SESSION['datos'][0]['Status'] == '1') { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href=<?= base_url() . "Welcome/Administracion" ?>>
                                            <span class="fas fa-home"></span> Inicio
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=<?= base_url() . "Welcome/AdministracionMapi" ?>>
                                            <span class="fas fa-globe"></span> Convocatoria Internacional
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=<?= base_url() . "Session/CerrarSesion" ?>>
                                            <span class="fas fa-sign-out-alt"></span> Cerrar Sesión
                                        </a>
                                    </li>
                                <?php } else { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href=<?= base_url() . "Welcome/index" ?>>
                                            <span class="fas fa-globe"></span> Convocatoria Internacional
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=<?= base_url() . "Welcome/index" ?>>
                                            <span class="fas fa-address-book"></span> Directorio
                                        </a>
                                    </li>
                                <?php } ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <br><br><br>



        <!-- Search field -->
        <div class="modal search fade" id="modal_search" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-body">
                    <form action="javascript:RedireccionaBuscador()">
                        <input type="text" class="search-field" id="txtSearch" placeholder="Buscar" value="">
                        <button type="submit" style="display: none;">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Search field -->