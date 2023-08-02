<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "senacba";
$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);
//EDITAR

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // ACTUALIZAR FICHA
  if (isset($_POST['envio_editar'])) {
    // Obtener los datos enviados por el formulario
    $numero_identificacion = $_POST["identificacion"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $carrera = $_POST["carrera"];
    $fecha_egreso = $_POST["fecha_egreso"];
    $tipo_etapa = $_POST["tipo_etapa"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $reconocimiento = $_POST["reconocimiento"];


    $file_name = $_FILES["foto"]["name"];
    $file_tmp = $_FILES["foto"]["tmp_name"];

    // Ruta donde se guardará la imagen
    $ruta_imagen = "img/guardada/" . $file_name;

    // Mover la imagen cargada a la ruta especificada
    if (move_uploaded_file($file_tmp, $ruta_imagen)) {
      $actualizar_ficha = "UPDATE tegresados SET foto ='$ruta_imagen' WHERE id = $id";
      $resultado_actualizar = mysqli_query($conexion, $actualizar_ficha);
    }
      // Actualizar los datos en la base de datos
      $actualizar_ficha = "UPDATE tegresados SET nombres = '$nombres', apellidos = '$apellidos', numero_identificacion = '$numero_identificacion', carrera = '$carrera',fecha_egreso = '$fecha_egreso', telefono = '$telefono', email = '$email',reconocimiento = '$reconocimiento',etapa_productiva = '$tipo_etapa' WHERE id = $id";
      $resultado_actualizar = mysqli_query($conexion, $actualizar_ficha);

      // Verificar si la actualización fue exitosa
      if ($resultado_actualizar) {
        echo "<div class='mensaje'><h2 class='envio'>Información editada correctamente</h2></div>";
      } else {
        echo "<div class='mensaje'><h2 class='error'>Se ha producido un error </div> " . "<br>" . mysqli_error($conexion);
      }
  }
  $consulta_egresado = "SELECT * FROM tegresados WHERE id = $id";
  $resultado_egresado = mysqli_query($conexion, $consulta_egresado);
  if ($resultado_egresado && mysqli_num_rows($resultado_egresado) > 0) {
$fila_egresado = mysqli_fetch_assoc($resultado_egresado);
  }
} 
//CREAR NUEVO 
if (isset($_POST['envio'])) {
    // Obtener los datos enviados por el formulario
    $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $Numero_identificacion = $_POST['identificacion'];
        $carrera = $_POST['carrera'];
        $fecha_egreso = $_POST['fecha_egreso'];
        $tipo_etapa = $_POST['tipo_etapa'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        // Obtener la información del archivo cargado
        $file_name = $_FILES["imagen"]["name"];
        $file_tmp = $_FILES["imagen"]["tmp_name"];

        // Mover el archivo cargado a la carpeta de imágenes en el servidor
        $ruta_imagen = "img/guardada/" . $file_name;
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], "img/guardada/" . $file_name)) {
            // Consulta de inserción
            $insertar_egresado = "INSERT INTO tegresados (foto, nombres, apellidos, numero_identificacion, carrera, fecha_egreso, etapa_productiva, telefono, email) VALUES ('$ruta_imagen', '$nombres', '$apellidos', '$Numero_identificacion', '$carrera', '$fecha_egreso', '$tipo_etapa', '$telefono', '$email')";
            // Ejecutar la consulta
            $resultado_egresado = mysqli_query($conexion, $insertar_egresado);
    // Verificar si la actualización fue exitosa
    if ($resultado_egresado) {
      echo "<div class='mensaje'><h2 class='envio'>Información guardada correctamente</h2></div>";
    } else {
      echo "<div class='mensaje'><h2 class='error'>Se ha producido un error </h2></div> ". mysqli_error($conexion);
    }
  }
}
//ELIMINAR
// Función para eliminar un registro por ID
if (isset($_GET['eliminar'])) {
  $id = $_GET['eliminar'];
  // Preparar la consulta con una sentencia preparada
  $eliminar_registro = mysqli_prepare($conexion, "DELETE FROM tegresados WHERE id = ?");
  mysqli_stmt_bind_param($eliminar_registro, "i", $id);
  
  // Ejecutar la consulta
  $resultado_eliminar = mysqli_stmt_execute($eliminar_registro);
  
  // Verificar si la eliminación fue exitosa
  if ($resultado_eliminar) {
    echo "<div class='mensaje'><h2 class='envio'>El registro se ha eliminado correctamente.</h2></div>";
  } else {
    echo "<div class='mensaje'><h2 class='error'>Error al eliminar el registro:</h2></div>" . mysqli_error($conexion);
  }
  
  // Cerrar la consulta
  mysqli_stmt_close($eliminar_registro);
}
// Obtener el valor del filtro de carrera (si se seleccionó)
$filtroCarrera = isset($_GET['carrera']) ? $_GET['carrera'] : '';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Egresados Destacados</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/egresados.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>    <header>

<div class="container__header">	

    <div class="logo">
        <img src="img/logonegro.png" alt="">
    </div>

    <div class="menu">
        <nav>
            <ul>
                <li><a href="#header">Inicio</a></li>
                <li><a href="#buscar">Buscar</a></li>
                <li><a href="#carreras">Carreras</a></li>
                <li><a href="#listado">Egresados</a></li>

            </ul>
        </nav>
    </div>
    <i class="fa-solid fa-bars" id="icon_menu"></i>
    <div class="header__register">
        <a class="btn__header-register agregar" href="#form_nuevo" >Agregar Egresado</a>
    </div>
</div>

</header>

<main>

<div class="cover" id="header">
    
    <div class="text__information-cover">
        <h1>Egresados Destacados del CBA</h1>

        <p>Bienvenido a la página de egresados destacados del SENA CBA. Aquí encontrarás información sobre las historias de éxito y logros de nuestros talentosos profesionales. Explora y descubre la inspiradora trayectoria de nuestros egresados.</p>

        <div class="buttons__cover">
            <a class="btn__register-cover" href="#buscar">Buscar Egresado</a>
            <a class="btn__readMore-cover" href="#banner">Leer más</a>
        </div>

    </div>

    <div class="media__cover">
        <img src="img/se.jpg" alt="">
    </div>


</div>

<div class="container__banner">

    <div class="banner" id="banner">
        <div class="banner__icon-heart">
            <img src="img/libro.png" id="icon_heart" alt="">
        </div>
        <div class="banner__icon-fire">
            <img src="img/medalla.png" id="icon_fire" alt="">
        </div>
        <div class="banner__text">
            <h2>Aquí puedes encontrar a los egresados destacados del SENA, quienes han adquirido habilidades y conocimientos en diferentes carreras y han logrado destacarse en sus campos. </h2>
            <a href="#buscar">Buscar egresado</a>
        </div>
    </div>

</div>

</main>
  
<div class="container__about div__offset">
    <div class="about" id="buscar">
    <div class="image__about">
            <img src="img/destacado.jpg" alt="">
        </div>
        <div class="text__about">
            <h1>Buscar Egresado Destacado</h1>
            <p>Utiliza nuestro buscador para encontrar a los egresados destacados del SENA CBA. Ingresa el número de identificación del egresado que deseas buscar.</p><br>
            <form action="#listado" method="GET" class="filtro-form">
                <input type="number" name="identificacion" placeholder="Número de identificación">
                <button type="submit">Buscar</button>
            </form>
        </div>   
        
    </div>
</div>

    <div class="container__trust container__card-primary" id="carreras">
            <div class="trust card__primary">
                <div class="text__trust text__card-primary">
                    
                    <h1>Egresados Destacados por Carrera</h1>
                    <p>Explora los perfiles de nuestros egresados destacados en diferentes carreras. Selecciona una carrera a continuación para ver los egresados destacados en esa área.</p>
                </div>
                <div class="container__trust container__box-cardPrimary">
                <div class='card__trust box__card-primary'><img src='img/folder.png' alt><br><a href="?carrera=#swipe">Todas las carreras</a></div>
                <?php
        // Consulta para obtener las carreras disponibles
        $consultaCarreras = "SELECT DISTINCT carrera FROM tegresados";
        $resultadoCarreras = mysqli_query($conexion, $consultaCarreras);

        while ($filaCarrera = mysqli_fetch_assoc($resultadoCarreras)) {
          $carrera = $filaCarrera["carrera"];
          $selected = ($carrera == $filtroCarrera) ? "selected" : "";
          echo "<div class='card__trust box__card-primary'>
          <img src='img/folder.png' alt=''>
          <br>
          <a href='?carrera=$carrera#listado' $selected>$carrera</a>
      </div>";
        }
        ?>
    </div>
    </div>
  
  <section id="listado" class="swiper mySwiper">
    <h2>Listado de Egresados</h2>
    <div class="swiper-wrapper">
      <?php
      // Consulta SQL con filtro de carrera y búsqueda rápida
      $consulta = "SELECT * FROM tegresados";
      if (!empty($filtroCarrera)) {
        $consulta .= " WHERE carrera = '$filtroCarrera'";
      }
      
      if (isset($_GET['identificacion'])) {
        $identificacion = $_GET['identificacion'];
        $consulta .= " WHERE (numero_identificacion LIKE '$identificacion')";
      }
      
      $resultado = mysqli_query($conexion, $consulta);

      while ($fila = mysqli_fetch_assoc($resultado)) {
        $id = $fila["id"];
        $nombres = $fila["nombres"];
        $apellidos = $fila["apellidos"];
        $carrera = $fila["carrera"];
        $foto = $fila["foto"];
        echo "
        <div  class='card swiper-slide'>
          <div class='card__image'>
            <img src='$foto' alt='card image'>
          </div>
          <div class='card__content'>
            <span class='card__title'>$nombres $apellidos</span>
            <span class='card__instructor'>$carrera</span>
            <a href='info_egresado.php?id=$id'>Ver Información</a>
            <a  href='?id=$id#form_editar' id='btn-editar'>Editar</a>
            <a href='?eliminar=$id'>Eliminar</a><br>
          </div>
        </div>";
      }
      // Verificar si se ha enviado el ID del registro a eliminar
      ?>
    </div>
  </section>
  <?php
/*form editar*/
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  echo '<section class="form">
  <form action="#listado" id="form_editar" method="POST" enctype="multipart/form-data">
  <h2>Editar Informacion</h2>
  <label for="nombres">Nombres:</label>
  <input type="text" name="nombres" value="'.$fila_egresado['nombres'].'"required><br>

  <label for="apellidos">Apellidos:</label>
  <input type="text" name="apellidos" value="'.$fila_egresado['apellidos'].'"required><br>

  <label for="imagen">Foto:</label>
  <input type="file" name="foto"><br>

  <label for="numero_identificacion">Número de Identificación:</label>
  <input type="number" name="identificacion" value="'.$fila_egresado['numero_identificacion'].'"required><br>

  <label for="carrera">Carrera:</label>
  <input type="text" name="carrera" required value="'.$fila_egresado['carrera'].'"><br>

  <label for="fecha_egreso">Fecha de Egreso:</label>
  <input type="date" name="fecha_egreso" value="'.$fila_egresado['fecha_egreso'].'"required><br>

  <label for="etapa_productiva">Tipo de Etapa Productiva:</label>
  <select name="tipo_etapa" required>
      <option value="proyecto productivo" '.($fila_egresado['etapa_productiva'] === 'proyecto productivo' ? 'selected' : '').'>Proyecto productivo</option>
      <option value="contrato de aprendizaje" '.($fila_egresado['etapa_productiva'] === 'contrato de aprendizaje' ? 'selected' : '').'>Contrato de aprendizaje</option>
      <option value="pasantia" '.($fila_egresado['etapa_productiva'] === 'pasantia' ? 'selected' : '').'>Pasantía</option>
  </select><br>  

  <label for="telefono">Teléfono:</label>
  <input type="tel" name="telefono" value="'.$fila_egresado['telefono'].'"required><br>

  <label for="email">Email:</label>
  <input type="email" name="email" value="'.$fila_egresado['email'].'"required><br>
  <label for="reconocimiento">Reconocimiento:</label>
  <textarea name="reconocimiento" required>'.$fila_egresado['reconocimiento'].'</textarea><br>
    <input type="submit" name="envio_editar" value="Actualizar Información">
  </form>
  </section>';
}
?>

<section class="form" id="form_nuevo">
  <form action="#listado" method="POST"  enctype="multipart/form-data">
    <h2>Nuevo egresado</h2>
    
    <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" required><br>

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" required><br>

            <label for="imagen">Foto:</label>
            <input type="file" name="imagen" required><br>

            <label for="numero_identificacion">Número de Identificación:</label>
            <input type="number" name="identificacion" required><br>

            <label for="carrera">Carrera:</label>
            <input type="text" name="carrera" required><br>

            <label for="fecha_egreso">Fecha de Egreso:</label>
            <input type="date" name="fecha_egreso" required><br>

            <label for="etapa_productiva">Tipo de Etapa Productiva:</label>
            <select name="tipo_etapa" required>
                <option value="proyecto productivo">Proyecto productivo</option>
                <option value="contrato de aprendizaje">Contrato de aprendizaje</option>
                <option value="pasantia">Pasantía</option>
            </select><br>  

            <label for="telefono">Teléfono:</label>
            <input type="tel" name="telefono" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="reconocimiento">Reconocimiento:</label>
            <textarea name="reconocimiento" required></textarea><br>
    <input type="submit" name="envio" value="Ingresar nuevo egresado">
    </form>
    </section>
</body>
<script>
            $(document).ready(function() {
  // Mostrar la alerta modal
  setTimeout(function() {
    $('.mensaje').fadeOut();
  }, 1000);
  // Mostrar el formulario al hacer clic en el botón
  $(".agregar").click(function() {
    $("#form_nuevo").fadeIn("3000");
  });
  $("#btn-editar").click(function() {
    $("#form_nuevo").hide();
  });
});
          </script>
</html>
