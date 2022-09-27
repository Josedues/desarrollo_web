<?php
// Conexión a la base de datos
include_once("conexion.php");

try {
    // Asignamos los datos de las variables
    $table1_id=$_POST['table1_id'];
    $farmacia=$_POST['farmacia'];
    $nom_vendedor=$_POST['nom_vendedor'];
    $datetime_venta=$_POST['datetime_venta'];
    $medicamento_vence=$_POST['medicamento_vence'];
    $unidades=$_POST['unidades'];
    $precio_unidad=$_POST['precio_unidad'];
    $email_cliente=$_POST['email_cliente'];

    $data = array($table1_id, $farmacia, $nom_vendedor, $datetime_venta, $medicamento_vence, $unidades, $precio_unidad, $email_cliente);

    $sql = "INSERT INTO table2(table1_id, farmacia, nom_vendedor, datetime_venta, medicamento_vence, unidades, precio_unidad, email_cliente) VALUES (?,?,?,?,?,?,?,?)";
    
    $respuesta = ejecutarConsulta($sql, $data, true);
    $table2_id = $pdo->lastInsertId();

    $sql = "SELECT * FROM table1 WHERE table1_id = ?";
    $data_fk = ejecutarConsulta_retornaFilas($sql, array($table1_id), true);

    $dt = array("table2_id"=> $table2_id);
    $data = array_merge($dt,$_POST);
    $data["data_fk"] = $data_fk[0];
  
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