<?php

require("../conexion.php");

$nombre=$_POST['nombre'];
$raza=$_POST['raza'];
$peso=$_POST['peso'];
$sexo=$_POST['sexo'];
$color=$_POST['color'];
$edad=$_POST['edad'];
$foto=$_POST['foto'];

$addMascota ="INSERT INTO mascotas
(nombre, raza, peso, sexo, color, edad, foto) 
VALUES (:nombre, :raza, :peso, :sexo, :color, :edad, :foto)";
$mascotaRow=[
  'nombre'=>$nombre,
  'raza'=>$raza,
  'peso'=>$peso,
  'sexo'=>$sexo,
  'color'=>$color,
  'edad'=>$edad,
  'foto'=>$foto
];
$mascotaQuery = $pcn->prepare($addMascota);
if($mascotaQuery->execute($mascotaRow)){
  echo json_encode(array("response"=>"SUCCESS", "detail"=>"Mascota registrado con exito"));
}else{
  echo json_encode(array("response"=>'ERROR',"detail"=>$mascotaQuery->errorInfo()));
}


$conn->close();

?>