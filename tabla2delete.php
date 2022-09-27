<?php
// Conexión a la base de datos
include_once("conexion.php");

try {

    $id = $_POST['id'];
    
    $sql = "SELECT * FROM table2 WHERE table2_id = ?";
    $data = ejecutarConsulta_retornaFilas($sql, array($id), true);
    if ($data != null) {
        $sql = "DELETE FROM table2 WHERE table2_id = ?";
        $respuesta = ejecutarConsulta($sql, array($id), true);

        $id = $data[0]['table1_id'];
        $sql = "SELECT * FROM table1 WHERE table1_id = ?";
        $data_fk = ejecutarConsulta_retornaFilas($sql, array($id), true);;

        $data[0]["data_fk"] = $data_fk[0];
        
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