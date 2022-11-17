<?php
include('database.php');

$id = $_POST["id"];
// echo '<script> alert("'. $id.'");</script>';


$conexion=conexion();
$DeleteRegistro = ("DELETE FROM mascota WHERE id= '".$id."' ");
$sql=mysqli_query($conexion, $DeleteRegistro);

if(isset($sql)){
    header("location:../Empleado.php");
}
?>