<?php
// Conexión a la base de datos
include_once("conexion.php");

try {
    // Asignamos los datos de las variables
    $id=$_POST['table1_id'];
    $descripcion=$_POST['descripcion'];
    $nom_medicamento=$_POST['nom_medicamento'];
    $stock=$_POST['stock'];

    $data = array($descripcion, $nom_medicamento, $stock, $id);
    $sql = "UPDATE table1 SET descripcion = ?, nom_medicamento = ?, stock = ? WHERE table1_id = ?";
    
    $resultado = ejecutarConsulta($sql, $data, true);
  
    // Retornamos resultados
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode([
        "mensaje"=> "Registro actualizado satisfactoriamente",
        'data' => $_POST
    ]);

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