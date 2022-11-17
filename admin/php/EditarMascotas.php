
<?php
include('database.php');
 $id = $_POST['Id'];
 $especie = $_POST['Especie'];
 $sexo = $_POST['Sexo'];
 $nombre = $_POST['Nombre'];
 $raza = $_POST['Raza'];
 $color = $_POST['Color'];
 $peso = $_POST['Peso'];
 $edad = $_POST['Edad'];
 $foto = $_POST['Foto'];


 $conexion=conexion();
 $update = ("UPDATE mascota
 	SET especie  ='".$especie."', 
     sexo  ='".$sexo."', 
     nombre  ='".$nombre."', 
     raza  ='".$raza."',
 	 color ='".$color."',
     peso ='".$peso."',     
     edad ='".$edad."',
     foto ='".$foto."'
     
     WHERE id='".$id."'");

 $result_update = mysqli_query($conexion, $update);

 if ($result_update== true) {
       // redireccion despues del registro
      header("location:../Admin.php");
  } else {
        // alerta de registro no valido
       echo '<script language="javascript">alert("Error de registro");window.location.href="../Admin.php."</script>';
  }
?>
