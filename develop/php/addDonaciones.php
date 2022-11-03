<?php
//Se llama al codigo que zhace la conexion a la base de datos
require("../conexion.php");
//Se obtinen los datos
$id_usuario=$_POST['id_usuario'];
$descripcion=$_POST['descripcion'];
//Se realiza el registro
$addDonacion ="INSERT INTO donaciones
(id_usuario, descripcion, fechayhora, estatus) 
VALUES (:usuario, :descripcion, :fechayhora, :estatus)";
$donacionRow=[
  'usuario'=>$id_usuario,
  'descripcion'=>$descripcion,
  'fechayhora'=>$date("Y-m-d H:i:s"),
  'estatus'=>1
];
$donacionQuery = $pcn->prepare($addDonacion);
if($donacionQuery->execute($donacionRow)){
  echo json_encode(array("response"=>"SUCCESS", "detail"=>"Informe de donacion realizado"));
}else{
  echo json_encode(array("response"=>'ERROR',"detail"=>$donacionQuery->errorInfo()));
}


$conn->close();

?>