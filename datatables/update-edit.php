<?php
include "conn.php";

if(isset($_POST['update'])){
    $nombres = mysqli_real_escape_string($conn, strip_tags($_POST['nombres'], ENT_QUOTES));
    $apellidos = mysqli_real_escape_string($conn, strip_tags($_POST['apellidos'], ENT_QUOTES));
    $numero_identificacion = mysqli_real_escape_string($conn, strip_tags($_POST['numero_identificacion'], ENT_QUOTES));
    $carrera = mysqli_real_escape_string($conn, strip_tags($_POST['carrera'], ENT_QUOTES));
    $fecha_egreso = mysqli_real_escape_string($conn, strip_tags($_POST['fecha_egreso'], ENT_QUOTES));
    $etapa_productiva = mysqli_real_escape_string($conn, strip_tags($_POST['etapa_productiva'], ENT_QUOTES));
    $telefono = intval($_POST['telefono']);
    $email = mysqli_real_escape_string($conn, strip_tags($_POST['email'], ENT_QUOTES));
    $reconocimiento = mysqli_real_escape_string($conn, strip_tags($_POST['reconocimiento'], ENT_QUOTES));

    // Aquí puedes agregar la lógica para manejar la carga y almacenamiento de fotos si es necesario

    $update = mysqli_query($conn, "UPDATE tegresados SET nombres='$nombres', apellidos='$apellidos', numero_identificacion='$numero_identificacion', carrera='$carrera', fecha_egreso='$fecha_egreso', etapa_productiva='$etapa_productiva', telefono=$telefono, email='$email', reconocimiento='$reconocimiento' WHERE id = ".$_POST['id']) or die(mysqli_error($conn));

    if($update){
        echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
    } else {
        echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
    }
}
?>
