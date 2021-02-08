<?php





#function to link the data base.
function conexion(){

    try {

        $conexion = new PDO("mysql:host=localhost;dbname=exvotos_laminas_mx" , "root","java0900");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conexion;
    
    } catch(PDOExeption $e) {
    
        return false;
    }
}


#function to clean and convert data like blank spaces , slashes and special caracters in HTML entities.

function limpiarDatos ($datos){

    $datos = trim($datos);

    $datos = stripslashes($datos);

    $datos = htmlspecialchars($datos);

    return $datos;
}



?>
