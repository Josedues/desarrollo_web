<?php
// Conexión a la base de datos
include_once("conexion.php");

try {
    // Asignamos los datos de las variables
    $table2_id=$_POST['table2_id'];
    $table1_id=$_POST['table1_id'];
    $farmacia=$_POST['farmacia'];
    $nom_vendedor=$_POST['nom_vendedor'];
    $datetime_venta=$_POST['datetime_venta'];
    $medicamento_vence=$_POST['medicamento_vence'];
    $unidades=$_POST['unidades'];
    $precio_unidad=$_POST['precio_unidad'];
    $email_cliente=$_POST['email_cliente'];

    $data = array($table1_id, $farmacia, $nom_vendedor, $datetime_venta, $medicamento_vence, $unidades, $precio_unidad, $email_cliente, $table2_id);

    $sql = "UPDATE table2 SET table1_id = ?, farmacia= ?, nom_vendedor= ?, datetime_venta = ?, medicamento_vence = ?, unidades= ?, precio_unidad = ?, email_cliente = ? WHERE table2_id = ?";
    
    $respuesta = ejecutarConsulta($sql, $data, true);

    $sql = "SELECT * FROM table1 WHERE table1_id = ?";

    $data_fk = ejecutarConsulta_retornaFilas($sql, array($table1_id), true);
  
    $data = array_merge($_POST, array("data_fk"=>$data_fk[0]));
    // Retornamos resultados
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode(["mensaje" => "Registro actualizado satisfactoriamente","data"=> $data]);
    
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