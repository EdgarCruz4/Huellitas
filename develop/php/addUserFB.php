<?php
//include('../post.php');


require("../conexion.php");

$nombre=$_POST['first_name'];
$apellido=$_POST['last_name'];
$email=$_POST['id'];

$selectCorreo ="SELECT correo
FROM usuario
WHERE correo = :correo";
$correoRow=[
  'correo'=>$email
];
$correoQuery = $pcn->prepare($selectCorreo);
if($correoQuery->execute($correoRow)){
    $correoResult = $correoQuery->fetchAll(PDO::FETCH_ASSOC);
    
    if ($correoResult) {
      echo("preRegistrado");      
    } else {
      $passwordHASH = password_hash($password, PASSWORD_DEFAULT);
      $addPersonal ="INSERT INTO usuario
      (nombre, apellido, correo, jerarquia) 
      VALUES (:nombre, :apellido, :correo, :jerarquia)";
      $personalRow=[
        'nombre'=>$nombre,
        'apellido'=>$apellido,
        'correo'=>$email,
        'jerarquia'=>3
      ];
      $personalQuery = $pcn->prepare($addPersonal);
      if($personalQuery->execute($personalRow)){
        echo("registrado");
      }else{
        echo json_encode(array("response"=>'ERROR',"detail"=>$personalQuery->errorInfo()));
      }
    }
    
    
}else{
    echo json_encode(array("response"=>'ERROR',"detail"=>$correoQuery->errorInfo()));
}



$conn->close();

?>