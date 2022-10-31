<?php
//include('../post.php');

//Se llama al codigo que zhace la conexion a la base de datos
require("../conexion.php");
//Se obtinen los datos
$nombre=$_POST['first_name'];
$apellido=$_POST['last_name'];
$email=$_POST['id'];
//Se hace la consulta que verifica si el usuario ya existe
$selectCorreo ="SELECT correo
FROM usuario
WHERE correo = :correo";
$correoRow=[
  'correo'=>$email
];
$correoQuery = $pcn->prepare($selectCorreo);
if($correoQuery->execute($correoRow)){
    $correoResult = $correoQuery->fetchAll(PDO::FETCH_ASSOC);
    //Si el usuario ya existe se notifica
    if ($correoResult) {
      echo("preRegistrado");      
    } 
    //si el usuario no existia entonce se realiza el registro
    else {
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