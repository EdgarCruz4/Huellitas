<?php 
//Se llama al codigo que zhace la conexion a la base de datos
require("../conexion.php");
//Se obtinen los datos
$email=$_POST['id'];
$retorno = array();
//Se realiza la consulta para obtener los datos, posteriormente se obtendra una respuesta
$event ="SELECT concat_ws(' ', nombre, apellido) as nombre, jerarquia, id FROM usuario WHERE correo = :correo";
$eventRow=['correo'=>$email];
$eventQuery = $pcn->prepare($event);
if($eventQuery->execute($eventRow)){
  $result = $eventQuery->fetchAll(PDO::FETCH_ASSOC);
  if($result){
    foreach($result as $row1){
        $id = $row1['id'];
        $nombre = $row1['nombre'];
        $jerarquia = $row1['jerarquia'];
    }
    echo json_encode(array(
      "response"=>'SUCCESS',
      'id'=>$id,
      'nombre'=>$nombre,
      'jerarquia'=>$jerarquia
    ));

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