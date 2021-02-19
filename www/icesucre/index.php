<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("location: ../index.php"); 
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="#" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw=="
        crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg=="
        crossorigin="anonymous">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
    body {
        background-color: #f5f5f5;
    }

    #buscar:focus {
        outline: none !important;
    }

    #buscar {
        background-image: url(../vendor/searchicon.png);
        background-position: 10px 7px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 13px;
        padding: 7px 17px 7px 38px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }
    </style>

</head>

<body>
    <?php
        $icepasss = "icesucre2021tudecides";
        include("../config/db.php");
        include("../config/conexion.php");
        include("../config/alertas.php");
        if(isset($_POST['insert_link'])){
            $link = addslashes ($_POST['link_sala']);
            if (empty($link)){
                $mensaje='Campo link requerido';
                popUpWarning($mensaje);
            }
            $sql = "UPDATE icesucre.Acampante SET Link_Zoom='$link'";
            $retval = mysqli_query($con,$sql);
            if($retval) {
                $mensaje = 'Registrado exitosamente \n '.$link;
                popUpSuccess('Link actualizado', $mensaje);
            } else if(! $retval ) {
                $mensaje = 'Nose pudo registrar';
                popUpWarning($mensaje);
               die('Could not enter data: ' . mysqli_error());
            }
        }
        if(isset($_POST['cambiar'])){
            $contrasena = addslashes ($_POST['userPassword']);
            if (empty($contrasena)){
                $mensaje='Campo contraseña requerido';
                popUpWarning($mensaje);
            }
            $contrasena =  sha1($contrasena);
            $id_user = addslashes ($_POST['id_user']);
            if (empty($id_user)){
                $mensaje='Usuario incorrecto';
                popUpWarning($mensaje);
            }
            $sql = "UPDATE icesucre.Acampante SET Contrasena='$contrasena' WHERE id=" .$id_user;
            $retval = mysqli_query($con,$sql);
            if($retval) {
                $mensaje = 'Cambio de contraseña exitoso';
                popUpSuccess('Contraseña actualizada', $mensaje);
            } else if(! $retval ) {
                $mensaje = 'Nose pudo registrar';
                popUpWarning($mensaje);
               die('Could not enter data: ' . mysqli_error());
            }
        }
        if(isset($_POST['dividir_cuartos'])){
            $sql_chicas = "SELECT id FROM icesucre.Acampante a WHERE a.Sexo = 'Femenino' ORDER BY Edad ASC";
            $resul_chicas = mysqli_query($con,$sql_chicas);
            $limitador = 0;
            $cuarto = 0;
            while ($fila = mysqli_fetch_array($resul_chicas)){
                if( $limitador % 10 === 0 ) {
                    $cuarto ++;
                }
                $limitador ++;
                $sql_insert_cuartos_chicas = "UPDATE icesucre.Acampante SET Numero_Cuarto=$cuarto WHERE id = " .$fila[0];
                $insertar_cuartos_chicas = mysqli_query($con,$sql_insert_cuartos_chicas);
            }

            $sql_chicos = "SELECT id FROM icesucre.Acampante a WHERE a.Sexo = 'Masculino' ORDER BY Edad ASC";
            $resul_chicos = mysqli_query($con,$sql_chicos);
            $limitador = 0;
            $cuarto = 0;
            while ($fila = mysqli_fetch_array($resul_chicos)){
                if( $limitador % 10 === 0 ) {
                    $cuarto ++;
                }
                $limitador ++;
                $sql_insert_cuartos_chicos = "UPDATE icesucre.Acampante SET Numero_Cuarto=$cuarto WHERE id = " .$fila[0];
                $insertar_cuartos_chicos = mysqli_query($con,$sql_insert_cuartos_chicos);
            }
            if($insertar_cuartos_chicas && $insertar_cuartos_chicos) {
                $mensaje = 'Realizado exitosamente';
                popUpSuccess('Division de cuartos', $mensaje);
            } else if(! $insertar_cuartos_chicas && $insertar_cuartos_chicos ) {
                $mensaje = 'Nose pudo registrar';
                popUpWarning($mensaje);
                die('Could not enter data: ' . mysqli_error());
            }
        }
        if(isset($_POST['dividir_equipos'])){
            $sql_cuartos = "SELECT id, Numero_Cuarto FROM icesucre.Acampante a ORDER BY Numero_Cuarto ASC";
            $resul_cuartos = mysqli_query($con,$sql_cuartos);
            $test;
            while ($fila = mysqli_fetch_array($resul_cuartos)){
                if ($fila[1]%2==0){
                    $sql_insert_equipos = "UPDATE icesucre.Acampante SET Color='Azul' WHERE id = " .$fila[0];
                    $insertar_equipo_rojo = mysqli_query($con,$sql_insert_equipos);
                } else {
                    $sql_insert_equipos = "UPDATE icesucre.Acampante SET Color='Rojo' WHERE id = " .$fila[0];
                    $insertar_equipo_amarillo = mysqli_query($con,$sql_insert_equipos);
                }
            }
            if($insertar_equipo_rojo && $insertar_equipo_amarillo) {
                $mensaje = 'Realizado exitosamente';
                popUpSuccess('Division de equipos', $mensaje);
            } else if(! $insertar_equipo_rojo && $insertar_equipo_amarillo ) {
                $mensaje = 'Nose pudo registrar';
                popUpWarning($mensaje);
                die('Could not enter data: ' . mysqli_error());
            }
        }
    ?>
    </br>
    </br>
    <div class="container">
        <div class="row">
            <div class="col-md-2 ">
                <div class="text-center">
                    <img src="../img/sucre/logo_camp.png" alt="" width="150"
                        height="100">
                    </br>
                    </br>
                    <a href="../controler/logout.php" class="btn btn-info btn-sm" role="button"
                        aria-pressed="true">Cerrar
                        sesión</a>
                    </br>
                    </br>
                </div>
            </div>
            <div class="col-md-10">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#1" data-toggle="tab">Acampantes</a>
                    </li>
                    <li><a href="#2" data-toggle="tab">Cuenta</a>
                    </li>
                </ul>
                <div class="tab-content ">
                    <div class="tab-pane active" id="1">
                        </br>
                        <div>
                            <?php
                                $sql_verificar_cuartos = "SELECT id FROM icesucre.Acampante a WHERE a.Numero_Cuarto IS NULL";
                                $resul_cuartos = mysqli_query($con,$sql_verificar_cuartos);
                                $row_cnt = $resul_cuartos->num_rows;
                                if (!empty($row_cnt)){
                                    echo '<div class="col-md-8"> <a href="#" class="btn btn-success btn-sm" role="button" aria-pressed="true"
                                        data-toggle="modal" data-target="#dividir_cuartos">Dividir a cuartos</a></div>';
                                } else {
                                    echo '<div class="col-md-2"> <a href="#" class="btn btn-danger btn-sm"
                                        aria-pressed="true" disabled>Cuartos divididos</a></div>';
                                    $sql_verificar_equipos = "SELECT id FROM icesucre.Acampante a WHERE a.Color IS NULL";
                                    $resul_equipo = mysqli_query($con,$sql_verificar_equipos);
                                    $row_cnt = $resul_equipo->num_rows;
                                    if (!empty($row_cnt)){
                                        echo '<div class="col-md-6"> <a href="#" class="btn btn-success btn-sm" role="button" aria-pressed="true"
                                            data-toggle="modal" data-target="#dividir_equipos">Dividir equipos</a></div>';
                                    } else {
                                        echo '<div class="col-md-6"> <a href="#" class="btn btn-danger btn-sm"
                                            aria-pressed="true" disabled>Equipos divididos</a></div>';
                                    }
                                }
                            ?>
                            <div class="col-md-2">
                            <button type="button" class="link-taller btn btn-info btn-sm" data-toggle="modal" data-target="#linkTaller">Insertar link</button>
                            </div>
                            <div class="col-md-2">
                                <a href="../controler/export.php" class="btn btn-info btn-sm" role="button"
                                    aria-pressed="true">Imprimir excel</a>
                            </div>
                        </div>
                        </br>
                        </br>
                        <input type="text" id="buscar" onkeyup="myFunction()" placeholder="Buscar por Nombres"
                            title="Buscar por Nombres">
                        <div class="table-responsive">
                            <?php
                                $query = "SELECT id, Nombres, Apellidos, Edad, Sexo, Celular, Ciudad, Usuario, Correo, Color, Numero_Cuarto, Taller
                                            FROM icesucre.Acampante";
                                $result = mysqli_query($con,$query); 
                                echo '<table id="acampante-abla" class="table table-striped">';
                                echo '<thead>
                                        <tr>
                                            <th></th>
                                            <th>id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Edad</th>
                                            <th>Telefono</th>
                                            <th>Ciudad</th>
                                            <th>Contraseña</th>
                                        </tr>
                                    </thead>';
                                while($row = $result->fetch_assoc()){
                                    echo '<tr>';
                                        echo '<td><a><span class="detalles-cuenta fa fa-search"
                                                data-nombre="' . $row['Nombres'] . '"
                                                data-apellido="' . $row['Apellidos'] . '"
                                                data-edad="' . $row['Edad'] . '"
                                                data-sexo="' . $row['Sexo'] . '"
                                                data-celular="' . $row['Celular'] . '"
                                                data-ciudad="' . $row['Ciudad'] . '"
                                                data-usuario="' . $row['Usuario'] . '"
                                                data-correo="' . $row['Correo'] . '"
                                                data-taller="' . $row['Taller'] . '"
                                                data-cuarto="' . $row['Numero_Cuarto'] . '"
                                                data-color="' . $row['Color'] . '"
                                                data-toggle="modal" data-target="#detallesCuenta"></span></a></td>';
                                        echo '<td>' . $row['id'] . '</td>';
                                        echo '<td>' . $row['Nombres'] . '</td>';
                                        echo '<td>' . $row['Apellidos'] . '</td>';
                                        echo '<td>' . $row['Edad'] . '</td>';
                                        echo '<td>' . $row['Celular'] . '</td>';
                                        echo '<td>' . $row['Ciudad'] . '</td>';
                                        echo '<td><button type="button" class="cambiar-contrasena btn btn-default btn-sm"
                                                data-id="' . $row['id'] . '" data-toggle="modal" data-target="#cambiarContrasena">Cambiar</button><td>';
                                    echo '</tr>';
                                }
                                echo '</table>';
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="2">
                        </br>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="Correo electronico">Usuario</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <i>nada por ahora<?php echo $usuario; ?></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Cuartos -->
        <div class="modal fade" id="dividir_cuartos" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title center" id="exampleModalLabel">Confirmacion de division de cuartos</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <p>Esta accion no se puede revertir ya que afectara a la base de datos de manera permanente
                            </p>
                            </br>
                            <div class="wrapper">
                                <span class="group-btn">
                                    <button type="submit" name="dividir_cuartos"
                                        class="btn btn-danger">Confirmar</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Equipos -->
        <div class="modal fade" id="dividir_equipos" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title center" id="exampleModalLabel">Confirmacion de dvision de equipo</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <p>Esta accion no se puede revertir ya que afectara a la base de datos de manera permanente
                            </p>
                            </br>
                            <div class="wrapper">
                                <span class="group-btn">
                                    <button type="submit" name="dividir_equipos"
                                        class="btn btn-danger">Confirmar</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Acampante -->
        <div class="modal fade" id="cambiarContrasena" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title center" id="exampleModalLabel">Nueva contraseña</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <input name="userPassword" type="text" id="userPassword"
                                class="form-control input-sm chat-input" placeholder="contraseña" minlength="8" />
                            <input style="display:none" name="id_user" id="id_user"
                                class="form-control input-sm chat-input" type="text" />
                            </br>
                            <div class="wrapper">
                                <span class="group-btn">
                                    <button type="submit" name="cambiar" class="btn btn-info">Guardar</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Acampante -->
        <div class="modal fade" id="detallesCuenta" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title center" id="exampleModalLabel">Detalles Usuario</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nombres</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="nombre" id="nombre"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Apellidos</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="apellido" id="apellido"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Edad</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="edad" id="edad"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Sexo</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="sexo" id="sexo"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Celular</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="celular" id="celular"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Ciudad</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="ciudad" id="ciudad"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Usuario</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="usuario" id="usuario"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Correo</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="correo" id="correo"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Taller</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="taller" id="taller"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Cuarto</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="cuarto" id="cuarto"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Equipo</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="color" id="color"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Link Taller -->
        <div class="modal fade" id="linkTaller" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title center" id="exampleModalLabel">Insertar Link de la sala</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <input name="link_sala" type="text" id="link_sala" class="form-control input-sm chat-input"
                                placeholder="link de sala" />
                            <input style="display:none" name="id_taller" id="id_taller"
                                class="form-control input-sm chat-input" type="text" />
                            </br>
                            <div class="wrapper">
                                <span class="group-btn">
                                    <button type="submit" name="insert_link" class="btn btn-info">Guardar</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
    $(document).on("click", ".cambiar-contrasena", function() {
        var userId = $(this).data('id');
        $(".modal-body #id_user").val(userId);
    });
    </script>

    <script type="text/javascript">
    $(document).on("click", ".detalles-cuenta", function() {
        var nombre = $(this).data('nombre');
        $(".modal-body #nombre").text(nombre);
        var apellido = $(this).data('apellido');
        $(".modal-body #apellido").text(apellido);
        var edad = $(this).data('edad');
        $(".modal-body #edad").text(edad);
        var sexo = $(this).data('sexo');
        $(".modal-body #sexo").text(sexo);
        var celular = $(this).data('celular');
        $(".modal-body #celular").text(celular);
        var ciudad = $(this).data('ciudad');
        $(".modal-body #ciudad").text(ciudad);
        var taller = $(this).data('taller');
        $(".modal-body #taller").text(taller);
        var usuario = $(this).data('usuario');
        $(".modal-body #usuario").text(usuario);
        var correo = $(this).data('correo');
        $(".modal-body #correo").text(correo);
        var cuarto = $(this).data('cuarto');
        $(".modal-body #cuarto").text(cuarto);
        var color = $(this).data('color');
        $(".modal-body #color").text(color);
    });
    </script>

    <script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("buscar");
        filter = input.value.toUpperCase();
        table = document.getElementById("acampante-abla");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    </script>

</body>

</html>