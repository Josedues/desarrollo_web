<?php
// Conexión a la base de datos
include_once("conexion.php");

try {
    $sql = "SELECT * FROM table2";

    $data = ejecutarConsulta_retornaFilas($sql, [], false);

    for ($i=0; $i <count($data) ; $i++) { 
        $sql = "SELECT * FROM table1 WHERE table1_id = ?";
        $data_fk = ejecutarConsulta_retornaFilas($sql, array($data[0]['table1_id']), true);
        $data[$i]["data_fk"] = $data_fk[0];
    }
  
    // Retornamos resultados
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode($data);
    
} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode([
        'error' => [
            'codigo' =>$e->getCode() ,
            'mensaje' => $e->getMessage()
        ]
    ]);
}


?>