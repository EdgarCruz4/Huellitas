<?php

require("../conexion.php");

$id_usuario=$_POST['id_usuario'];
$id_mascota=$_POST['id_mascota'];

$addAdopcion ="INSERT INTO adopciones
(id_usuario, id_mascota, fechayhora, estatus) 
VALUES (:usuario, :mascota, :fechayhora, :estatus)";
$adopcionRow=[
  'usuario'=>$id_usuario,
  'mascota'=>$id_mascota,
  'fechayhora'=>date("Y-m-d H:i:s"),
  'estatus'=>1
];
$adopcionQuery = $pcn->prepare($addAdopcion);
if($adopcionQuery->execute($adopcionRow)){
  echo json_encode(array("response"=>"SUCCESS", "detail"=>"Solocitud de adopcion realizada"));
}else{
  echo json_encode(array("response"=>'ERROR',"detail"=>$adopcionQuery->errorInfo()));
}


$conn->close();

?>