<?php

require("../conexion.php");

$raza=$_POST['especie'];

$mascotas ="SELECT *
FROM mascotas 
WHERE raza = :raza";
$mascotasRow=[
    'raza'=>$raza
];
$mascotasQuery = $pcn->prepare($mascotas);
if($mascotasQuery->execute($mascotasRow)){
    $resultMascotas = $mascotasQuery->fetchAll(PDO::FETCH_ASSOC);
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
            foreach ($resultAdopciones as $rowAdpns) {
                array_push($arrA,$rowAdpns['id_mascota']);
            }
            foreach ($resultMascotas as $rowMts) {
                if (in_array($rowMts['id'], $arrA)==false){
                    foreach ($resultVacunas as $rowVns) {
                        if ($rowVns['id_mascota'] == $rowMts['id']) {
                            array_push($arrV,[
                                'vacuna'=>$rowVns['vacuna'],
                                'fecha'=>$rowVns['fecha']
                            ]);
                        }
                    }
                    array_push($arrMV,[
                        'id_mascota'=>$rowMts['id'],
                        'nombre'=>$rowMts['nombre'],
                        'edad'=>$rowMts['edad'],
                        'peso'=>$rowMts['peso'],
                        'color'=>$rowMts['color'],
                        'raza'=>$rowMts['raza'],
                        'sexo'=>$rowMts['sexo'],
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
