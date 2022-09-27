<?php
//Ip de la pc servidor de base de datos
define("DB_HOST","localhost");

//Nombre de la base de datos
define("DB_NAME", "desarrollo_web");

//Usuario de la base de datos
define("DB_USERNAME", "root");

//Contraseña del usuario de la base de datos
define("DB_PASSWORD", "");

$servidor = "mysql:dbname=".DB_NAME.";host=".DB_HOST;

try {
    $pdo = new PDO($servidor, DB_USERNAME, DB_PASSWORD);
    //echo "<script>alert('Conexion exitosa a la BD');</script>";
    function ejecutarConsulta($sql, $data, $flag){
        global $pdo;
        $stmt = $pdo->prepare($sql);
        if($flag){
            for ($i=0; $i < count($data); $i++) {
                $stmt->bindparam(($i+1),$data[$i]);
            }
        }
        return $stmt->execute();
    }

    function ejecutarConsulta_retornaFilas($sql, $data, $flag){
        global $pdo;
        $stmt = $pdo->prepare($sql);
        if($flag){
            for ($i=0; $i < count($data); $i++) {
                $stmt->bindparam(($i+1),$data[$i]);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>