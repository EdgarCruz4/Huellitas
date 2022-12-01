<?php

include_once('database.php');

//Recibe los datos del formulario.
        $Especie = $_POST['Especie'];
        $Sexo = $_POST['Sexo'];
        $Nombre = $_POST['Nombre'];
        $Peso = $_POST['Peso'];
        $Color = $_POST['Color'];
        $Edad = $_POST['Edad'];
        $Foto = $_POST['Foto'];
  
$conexion=conexion();
 $sql="INSERT INTO mascotas(sexo, nombre, raza, color, peso,edad,foto)
VALUES('$Sexo','$Nombre','$Especie', '$Color','$Peso','$Edad','$Foto')";

 $Result=mysqli_query($conexion, $sql);

 if ($Result== true) {
       // redireccion despues del registro
      header("location:../../AdminVista.php");
  } else {
        // alerta de registro no valido
       echo '<script language="javascript">alert("Error de registro");window.location.href="../Admin.php."</script>';
  }
?>