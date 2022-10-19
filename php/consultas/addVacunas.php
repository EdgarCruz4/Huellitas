<?php

require("../conexion.php");

$id_mascota=$_POST['id_mascota'];
$vacuna=$_POST['vacuna'];

$addVacuna ="INSERT INTO vacunas
(id_mascota, vacuna, fecha) 
VALUES (:mascota, :vacuna, :fecha)";
$vacunaRow=[
  'mascota'=>$id_mascota,
  'vacuna'=>$vacuna,
  'fecha'=>date("Y-m-d")
];
$vacunaQuery = $pcn->prepare($addVacuna);
if($vacunaQuery->execute($vacunaRow)){
  echo json_encode(array("response"=>"SUCCESS", "detail"=>"Vacuna registrado con exito"));
}else{
  echo json_encode(array("response"=>'ERROR',"detail"=>$vacunaQuery->errorInfo()));
}

      
$conn->close();

?>