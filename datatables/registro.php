<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("head.php");?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="http://obedalvarado.pw/" target="_blank">Sistemas Web</a>
            </div>
        </div>
    </div><br />

    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="content">
                    <?php
                    if(isset($_POST['input'])){
                        $nombres = mysqli_real_escape_string($conn, strip_tags($_POST['nombres'], ENT_QUOTES));
                        $apellidos = mysqli_real_escape_string($conn, strip_tags($_POST['apellidos'], ENT_QUOTES));
                        $foto = mysqli_real_escape_string($conn, strip_tags($_POST['foto'], ENT_QUOTES));
                        $numero_identificacion = mysqli_real_escape_string($conn, strip_tags($_POST['numero_identificacion'], ENT_QUOTES));
                        $carrera = mysqli_real_escape_string($conn, strip_tags($_POST['carrera'], ENT_QUOTES));
                        $fecha_egreso = $_POST['fecha_egreso'];
                        $etapa_productiva = mysqli_real_escape_string($conn, strip_tags($_POST['etapa_productiva'], ENT_QUOTES));
                        $telefono = intval($_POST['telefono']);
                        $email = mysqli_real_escape_string($conn, strip_tags($_POST['email'], ENT_QUOTES));
                        $reconocimiento = mysqli_real_escape_string($conn, strip_tags($_POST['reconocimiento'], ENT_QUOTES));
                        $registrado = date("Y-m-d H:i:s");

                        $insert = mysqli_query($conn, "INSERT INTO tegresados (nombres, apellidos, foto, numero_identificacion, carrera, fecha_egreso, etapa_productiva, telefono, email, reconocimiento) 
                        VALUES ('$nombres', '$apellidos', '$foto', '$numero_identificacion', '$carrera', '$fecha_egreso', '$etapa_productiva', $telefono, '$email', '$reconocimiento')") or die(mysqli_error($conn));

                        if($insert){
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
                        }
                    }
                    ?>
            
                    <blockquote>
                        Agregar egresado
                    </blockquote>
                    <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">
                        <!-- Agrega campos para los datos del egresado -->
                        <div class="control-group">
                            <label class="control-label" for="nombres">Nombres</label>
                            <div class="controls">
                                <input type="text" name="nombres" id="nombres" placeholder="Nombres" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="apellidos">Apellidos</label>
                            <div class="controls">
                                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="foto">Foto</label>
                            <div class="controls">
                                <input type="text" name="foto" id="foto" placeholder="Foto" class="form-control span8 tip">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="numero_identificacion">Número de Identificación</label>
                            <div class="controls">
                                <input type="text" name="numero_identificacion" id="numero_identificacion" placeholder="Número de Identificación" class="form-control span8 tip">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="carrera">Carrera</label>
                            <div class="controls">
                                <input type="text" name="carrera" id="carrera" placeholder="Carrera" class="form-control span8 tip">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fecha_egreso">Fecha de Egreso</label>
                            <div class="controls">
                                <input type="date" name="fecha_egreso" id="fecha_egreso" class="form-control span8 tip">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="etapa_productiva">Etapa Productiva</label>
                            <div class="controls">
                                <input type="text" name="etapa_productiva" id="etapa_productiva" placeholder="Etapa Productiva" class="form-control span8 tip">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="telefono">Teléfono</label>
                            <div class="controls">
                                <input type="text" name="telefono" id="telefono" placeholder="Teléfono" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="email">Correo Electrónico</label>
                            <div class="controls">
                                <input type="email" name="email" id="email" placeholder="Correo Electrónico" class="form-control span8 tip">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="reconocimiento">Reconocimiento</label>
                            <div class="controls">
                                <input type="text" name="reconocimiento" id="reconocimiento" placeholder="Reconocimiento" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                                <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer span-12">
        <div class="container">
            <center> <b class="copyright"><a href="http://obedalvarado.pw/"> Sistemas Web</a> &copy; <?php echo date("Y")?> DataTables Bootstrap </b></center>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
