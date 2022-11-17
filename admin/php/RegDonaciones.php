<?php

include_once('database.php');

//Recibe los datos del formulario.
        $Concepto = $_POST['Concepto'];
        $Cantidad = $_POST['Cantidad'];
//
$conexion=conexion();
 $sql="INSERT INTO donaciones(concepto, cantidad)
VALUES('$Concepto', '$Cantidad')";

 $Result=mysqli_query($conexion, $sql);

 if ($Result== true) {
       // redireccion despues del registro
      header("location:../Admin.php");
  } else {
        // alerta de registro no valido
       echo '<script language="javascript">alert("Error de registro");window.location.href="../Admin.php."</script>';
  }
?>