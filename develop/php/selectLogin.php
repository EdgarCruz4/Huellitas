<?php 
//Se llama al codigo que zhace la conexion a la base de datos
require("../conexion.php");
//Se obtinen los datos
$email=$_POST['email'];
$upassword=$_POST['password'];
$retorno = array();
//Se obtinen los datos
$event ="SELECT correo, contraseña, concat_ws(' ', nombre, apellido) as nombre, jerarquia, id FROM usuario WHERE correo = :correo";
$eventRow=['correo'=>$email];
$eventQuery = $pcn->prepare($event);
if($eventQuery->execute($eventRow)){
  $result = $eventQuery->fetchAll(PDO::FETCH_ASSOC);
  if($result){
    foreach($result as $row1){
        $emailDB = $row1['correo'];
        $passwordDB = $row1['contraseña'];
        $id = $row1['id'];
        $nombre = $row1['nombre'];
        $jerarquia = $row1['jerarquia'];
    }
    if(password_verify($upassword,$passwordDB)){
      echo json_encode(array(
        "response"=>'SUCCESS',
        'id'=>$id,
        'nombre'=>$nombre,
        'jerarquia'=>$jerarquia
      ));
    }else{
      echo json_encode(array(
        "response"=>'ERROR1',
        "detail"=>"La contraseña es incorrecta"
      ));
    }
  }else{
    echo json_encode(array(
      "response"=>'ERROR1',
      "detail"=>"El usuario no se encuentra registrado"
    ));
  }
}else{
  echo json_encode(array("response"=>'ERROR',"detail"=>$eventQuery->errorInfo()));
}

$conn->close();

?>