<?php
// Conexión a la base de datos
include_once("conexion.php");

try {
    $id = $_GET["id"];

    $sql = "SELECT * FROM table2 WHERE table2_id = ?";
    $data = ejecutarConsulta_retornaFilas($sql, array($id), true);

    $sql = "SELECT * FROM table1 WHERE table1_id = ?";
    $data_fk = ejecutarConsulta_retornaFilas($sql, array($data[0]['table1_id']), true);

    $data[0]["data_fk"] = $data_fk[0];
  
    // Retornamos resultados
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode($data[0]);
    
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