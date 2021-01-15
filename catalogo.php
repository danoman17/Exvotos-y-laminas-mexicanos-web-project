<?php 
    
    require 'funciones.php';

    $conexion = conexion('exvotos_laminas_mx', 'root', 'java0900');

    if(!$conexion) {

        //redirigir la pagina de error
        //Por el momento estamos 

        die();
    }


    $statement = $conexion->prepare('SELECT * FROM product,category WHERE product.idCategory = category.idCategory');
    $statement->execute();

    
    $prod_stmt = $statement->fetchAll();

    
    // foreach ($prod_stmt as $key) {
    //     print_r($key);
    // }

    require 'views/catalogo.view.php';

?>