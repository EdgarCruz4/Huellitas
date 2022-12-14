<?php
//Se llama al codigo que zhace la conexion a la base de datos
require("../conexion.php");
//Se obtinen los datos
$raza=$_POST['especie'];
//Se hace la consulta para obtener los datos de las mascotas
$mascotas ="SELECT *
FROM mascotas 
WHERE raza = :raza";
$mascotasRow=[
    'raza'=>$raza
];
$mascotasQuery = $pcn->prepare($mascotas);
if($mascotasQuery->execute($mascotasRow)){
    $resultMascotas = $mascotasQuery->fetchAll(PDO::FETCH_ASSOC);
    //Se hace la consulta  que nos otoraga el estatus de cada mascota
    $adopciones ="SELECT id_mascota
    FROM adopciones
    WHERE estatus = :apartado OR estatus = :adoptado";
    $adopcionesRow=[
        'apartado'=>1,
        'adoptado'=>2
    ];
    $adopcionesQuery = $pcn->prepare($adopciones);
    if($adopcionesQuery->execute($adopcionesRow)){
        $resultAdopciones = $adopcionesQuery->fetchAll(PDO::FETCH_ASSOC);
        //Se hace la consulta para obtener las vacunas de las mascotas
        $vacunas ="SELECT *
        FROM vacunas";
        $vacunasRow=[];
        $vacunasQuery = $pcn->prepare($vacunas);
        if($vacunasQuery->execute($vacunasRow)){
            $resultVacunas = $vacunasQuery->fetchAll(PDO::FETCH_ASSOC);
            $arrF = array();
            $arrV = array();
            $arrMV = array();
            $arrA = array();
            //Obtenemos los id´s de las mascotas cuyas adopciones no fueron concretaadas
            foreach ($resultAdopciones as $rowAdpns) {
                array_push($arrA,$rowAdpns['id_mascota']);
            }
            foreach ($resultMascotas as $rowMts) {
                //Se obtinen los id´s de las mascotas disponibles para una adopcion
                if (in_array($rowMts['id'], $arrA)==false){
                    //Se obtienen las vacunas de la mascota
                    foreach ($resultVacunas as $rowVns) {
                        if ($rowVns['id_mascota'] == $rowMts['id']) {
                            array_push($arrV,[
                                'vacuna'=>$rowVns['vacuna'],
                                'fecha'=>$rowVns['fecha']
                            ]);
                        }
                    }
                    //Los datos son ordenados en un arreglo
                    array_push($arrMV,[
                        'idMascota'=>$rowMts['id'],
                        'nombre'=>$rowMts['nombre'],
                        'edad'=>$rowMts['edad'],
                        'peso'=>$rowMts['peso'],
                        'color'=>$rowMts['color'],
                        'raza'=>$rowMts['raza'],
                        'sexo'=>$rowMts['sexo'],
                        'foto'=>$rowMts['foto'],
                        'vacunas'=>$arrV
                    ]);
                    unset($arrV);
                    $arrV = array();
                    array_push($arrF,$arrMV);
                    unset($arrMV);
                    $arrMV = array();
                }
            }
            echo json_encode(array("response"=>"OK", "detail"=>$arrF));
        }else{
            echo json_encode(array("response"=>'ERROR',"detail"=>$vacunasQuery->errorInfo()));
        }
    }else{
        echo json_encode(array("response"=>'ERROR',"detail"=>$adopcionesQuery->errorInfo()));
    }
}else{
    echo json_encode(array("response"=>'ERROR',"detail"=>$mascotasQuery->errorInfo()));
}
 
$conn->close();

?>
