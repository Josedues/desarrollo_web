<?php
// Conexión a la base de datos
include_once("conexion.php");

try {
    // Asignamos los datos de las variables
    $descripcion=$_POST['descripcion'];
    $nom_medicamento=$_POST['nom_medicamento'];
    $stock=$_POST['stock'];

    $data = array($descripcion, $nom_medicamento, $stock);
    

    $sql = "INSERT INTO table1(descripcion, nom_medicamento, stock) VALUES (?,?,?)";
 
    $resultado = ejecutarConsulta($sql, $data, true);
  
    // Retornamos resultados
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode([
        'id' => $pdo->lastInsertId(),
        'descripcion' => $descripcion,
        'nom_medicamento' => $nom_medicamento,
        'stock' => $stock
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