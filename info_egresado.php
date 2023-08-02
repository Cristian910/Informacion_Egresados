<!DOCTYPE html>
<html>
  <head>
    <title>Información del egresado</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/infoegre.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">

    <script>
      function goBack() {
        window.history.back();
      }
    </script>
  </head>
  <body>
    <?php
      // Conexión a la base de datos
      $servidor = "localhost";
      $usuario = "root";
      $password = "";
      $basedatos = "senacba";
      $conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

      // Obtener el ID del estudiante seleccionado
      $id = $_GET["id"];

      // Consulta para recuperar información del estudiante seleccionado
      $consulta = "SELECT * FROM tegresados WHERE id = " . $id;
      $resultado = mysqli_query($conexion, $consulta);
      $fila_egresado = mysqli_fetch_assoc($resultado);

      // Mostrar la información del estudiante seleccionado
      if ($fila_egresado) {
        $numero_identificacion = $fila_egresado["numero_identificacion"];
        $nombre = $fila_egresado["nombres"]." ".$apellidos = $fila_egresado["apellidos"];
        $carrera = $fila_egresado["carrera"];
        $fecha_egreso = $fila_egresado["fecha_egreso"];
        $foto = $fila_egresado["foto"];
        $telefono = $fila_egresado["telefono"];
        $email = $fila_egresado["email"];
        $reconocimiento = $fila_egresado["reconocimiento"];

      }
    ?>
    <nav>
    <a class='boton-volver' href='egresados.php'>Volver</a>
      <img src="img/logosena.png" alt="">
    </nav>
    <?php     
    if ($fila_egresado) {
        echo '<section class="presentacion">
        <img src='.$foto.'>
        <h1>'.$nombre.'</h1>
        <h3>Número de Identificación</h3>
        <p>'.$numero_identificacion.'</p>
        <h3>Carrera</h3>
        <p>'.$carrera.'</p>
        <h3>Fecha de Egreso</h3>
        <p>'.$fecha_egreso.'</p>
        <a  href="egresados.php?id='.$id.'#form_editar" id="btn-editar">Editar</a>
        <a href="egresados.php?eliminar='.$id.'">Eliminar</a><br>
        </section>';
    }
?>

    <main>
      <?php

          echo '
          <section class="estudios-realizados">
            <h2>Reconocimientos</h2>
            <div class="card-horizontal">
              <div class="card-content">
                <p>'.$reconocimiento.'</p>
              </div>
            </div>
            <a href="editar_egresado.php?id='.$id.'">Editar</a><br>
            </section>';

        if (!empty($telefono) || !empty($email)) {
          echo '<section class="contacto">
          <h2>Contacto</h2>
          <div class="card-horizontal">
          <div class="card-content">
          <p>'.$telefono.'</p>
          <p>'.$email.'</p>';
          }
          echo '</div>
          </div>
          <a href="editar_egresado.php?id='.$id.'">Editar</a><br>
          </section>';
      ?>
    </main>
  </body>
</html>
