<?php
// Conexión a la base de datos
include_once("conexion.php");

try {
    
    $sql = "SELECT * FROM table1";

    $data = ejecutarConsulta_retornaFilas($sql, [], false);
  
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