<?php
//include('../post.php');


require("../conexion.php");

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$password=$_POST['password'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];

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
      (nombre, apellido, correo, contraseña, direccion, telefono, jerarquia) 
      VALUES (:nombre, :apellido, :correo, :upassword, :direccion, :telefono, :jerarquia)";
      $personalRow=[
        'nombre'=>$nombre,
        'apellido'=>$apellido,
        'correo'=>$email,
        'upassword'=>$passwordHASH,
        'direccion'=>$direccion,
        'telefono'=>$telefono,
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