<?php
    require("database.php");
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    //conectar a base de datos
    $conexion= Conexion();
    $consulta="SELECT * FROM admin WHERE usuario='$usuario' and password ='$password'";
 
    $Result=mysqli_query($conexion, $consulta);

    $filas=mysqli_num_rows($Result);

        if ($filas>0) {
             // inicio de sesion..
             session_start();
            $_SESSION['usuario']=$usuario;
            // redirecionara a pagina..
            header("location:../Admin.php");
        } else {
              // alerta de usuario ou contraseña no valido
             echo '<script language="javascript">alert("Error de autentificacion");window.location.href="../../admin.php"</script>';
        }

    mysqli_free_result($Result);
    mysqli_close($conexion);

?>	                    