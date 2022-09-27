<?php
// Conexión a la base de datos
include_once("conexion.php");

try {

    $id = $_POST['id'];

    $sql = "SELECT * FROM table1 WHERE table1_id = ?";
    
    $data = ejecutarConsulta_retornaFilas($sql, array($id), true);
    if ($data != null) {
        $sql = "DELETE FROM table1 WHERE table1_id = ?";
        $resultado = ejecutarConsulta($sql, array($id), true);
    
        header('Content-type:application/json;charset=utf-8');    
        echo json_encode(["mensaje" => "Registro eliminado satisfactoriamente", "data"=>$data[0]]);
    }else{
        header('Content-type:application/json;charset=utf-8');    
        echo json_encode(["mensaje" => "El id ingresado no pertenece a ningun registro"]);
    }
    

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