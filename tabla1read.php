<?php
// Conexión a la base de datos
include_once("conexion.php");

try {
    
    $id=$_GET['id'];

    $sql = "SELECT * FROM table1 WHERE table1_id = ?";
    $data = ejecutarConsulta_retornaFilas($sql, array($id), true);
  
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