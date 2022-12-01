
<?php
include('database.php');
 $id = $_POST['Id'];
 $raza = $_POST['Raza'];
 $sexo = $_POST['Sexo'];
 $nombre = $_POST['Nombre'];
 $color = $_POST['Color'];
 $peso = $_POST['Peso'];
 $edad = $_POST['Edad'];
 $foto = $_POST['Foto'];


 $conexion=conexion();
 $update = ("UPDATE mascotas
 	SET 
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
      header("location:../../AdminVista.php");
  } else {
        // alerta de registro no valido
       echo '<script language="javascript">alert("Error de registro");window.location.href="../../AdminVista.php."</script>';
  }
?>
