<?php

require("../conexion.php");

$id_adopcion = $_POST["id"];
$estatus = $_POST["estatus"];

$updae ="UPDATE adopciones 
SET estatus = :estatus
WHERE id = :id";
$eventRow=[
  'id'=>$id_adopcion, 
  'estatus'=>$estatus
];
$eventQuery = $pcn->prepare($event);
if($eventQuery->execute($eventRow)){
  echo json_encode(array("response"=>"OK", "detail"=>"El registro fue actualizado correctamente"));
}else{
  echo json_encode(array("response"=>'ERROR',"detail"=>$eventQuery->errorInfo()));
}

      
$conn->close();

?>