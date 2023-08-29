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
                    $id = intval($_GET['id']);
                    $sql = mysqli_query($conn, "SELECT * FROM tegresados WHERE id='$id'");
                    if(mysqli_num_rows($sql) == 0){
                        header("Location: index.php");
                    } else {
                        $row = mysqli_fetch_assoc($sql);
                    }
                    ?>

                    <blockquote>
                        Actualizar datos del egresado
                    </blockquote>
                    <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                        <!-- Agrega campos para los datos del egresado -->
                        <div class="control-group">
                            <label class="control-label" for="nombres">Nombres</label>
                            <div class="controls">
                                <input type="text" name="nombres" id="nombres" value="<?php echo $row['nombres']; ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="apellidos">Apellidos</label>
                            <div class="controls">
                                <input type="text" name="apellidos" id="apellidos" value="<?php echo $row['apellidos']; ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="foto">Foto</label>
                            <div class="controls">
                                <input type="text" name="foto" id="foto" value="<?php echo $row['foto']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="numero_identificacion">Número de Identificación</label>
                            <div class="controls">
                                <input type="text" name="numero_identificacion" id="numero_identificacion" value="<?php echo $row['numero_identificacion']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="carrera">Carrera</label>
                            <div class="controls">
                                <input type="text" name="carrera" id="carrera" value="<?php echo $row['carrera']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fecha_egreso">Fecha de Egreso</label>
                            <div class="controls">
                                <input type="date" name="fecha_egreso" id="fecha_egreso" value="<?php echo $row['fecha_egreso']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="etapa_productiva">Etapa Productiva</label>
                            <div class="controls">
                                <input type="text" name="etapa_productiva" id="etapa_productiva" value="<?php echo $row['etapa_productiva']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="telefono">Teléfono</label>
                            <div class="controls">
                                <input type="tel" name="telefono" id="telefono" value="<?php echo $row['telefono']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="email">Correo Electrónico</label>
                            <div class="controls">
                                <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="reconocimiento">Reconocimiento</label>
                            <div class="controls">
                                <input type="text" name="reconocimiento" id="reconocimiento" value="<?php echo $row['reconocimiento']; ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
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
