<?php
    include('controler/login.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Campamento - Tu Decides!!!</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.css" rel="stylesheet">

    <!-- Custom javaScript for alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Inicio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link" role="button" data-toggle="modal"
                            data-target="#ingresar">Ingresar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal login -->
    <form class="form-signin" action="#" method="post">
        <div class="modal fade" id="ingresar" tabindex="-1" role="dialog" aria-labelledby="ingresarLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="ingresarLabel">Iniciar sesion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input name="username" type="user" id="userName" class="form-control input-sm chat-input"
                            placeholder="Nombres de usuario" />
                        </br>
                        <input name="password" type="password" id="userPassword"
                            class="form-control input-sm chat-input" placeholder="contraseña" />
                        </br>
                        <a class="example-popover" data-toggle="popover" title="Habla con nosotros al"
                            data-content="WhatsApp +591 68424406">Olvidaste tu contraseña?</a>
                        </br>
                        </br>
                        <div class="wrapper">
                            <span class="group-btn">
                                <input name="submit" class="btn btn-primary btn-md" type="submit" value="Ingresar">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container">
                <img src="img/sucre/logo_camp.png" class="img-fluid" alt="">
                <h2 class="masthead-subheading mb-0">No Te Lo Puedes Perder !!!</h2>
                <a href="#" class="btn btn-xl rounded-pill mt-5" role="button" data-toggle="modal"
                    data-target="#ingresar"
                    style="color: #fff; background-color: #ffc107; border-color: #ffc107;">Ingresar</a>
                <!-- <a href="registro.php" class="btn btn-xl rounded-pill mt-5"
                    style="color: #fff; background-color: #ffc107; border-color: #ffc107;">Registrate ahora!</a> -->
            </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
    </header>

    <section class="fondo-predicadores">
        <div class="container">
            <div class="row align-items-center">
                <div class="header-content">
                    <img class="sucre-logo" src="img/sucre/logo_iglesia.png" alt="">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="img/sucre/predicadores/predicador_1.jpeg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">ALE NUESCH</h2>
                        <p>Tú Decides Restarurar tu relación con Dios</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="img/sucre/predicadores/predicador_2.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4">DANIEL OUBEL</h2>
                        <p>Tú decides Vivir en santidad.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="img/sucre/predicadores/predicador_3.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">NACHO FERRO</h2>
                        <p>Tú decides Caminar con Dios</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="img/sucre/predicadores/predicador_4.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4">OMAR CATALÁN</h2>
                        <p>Tú decides donde pasar la eternidad.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="img/sucre/predicadores/predicador_5.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">SERGIO MARTÍNES</h2>
                        <p>Tú decides proclamar el evangelio</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="fondo-talleres">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="img/sucre/predicadores/taller_1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4">FERNANDO ORIANO</h2>
                        <p>Conductas auto destructivas.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="img/sucre/predicadores/taller_3.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">PABLO ARANGUREN</h2>
                        <p>Noviazgo</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-black">
        <div class="container">
            <p class="m-0 text-center text-white small">Copyright &copy; icevalentinabecia.com 2021</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this counter -->
    <script src="js/simplyCountdown.min.js"></script>
    <!-- <script src="js/countdown.js"></script> -->

    <?php
        if (!empty($error)) {
            include("config/alertas.php");
            popUpWarning($error);
        }
    ?>
    <script>
    $(function() {
        $('.example-popover').popover({
            container: 'body'
        })
    })
    </script>

</body>

</html>