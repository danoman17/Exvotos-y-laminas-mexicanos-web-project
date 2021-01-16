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


    function etiquetas($id, $conexion){
        
        $cadena_stickers = "";

        $statement1 = $conexion->prepare('SELECT sticker FROM stickers WHERE idProduct = :id');
        $statement1->execute(array(
            ':id' => $id
        ));

        $resultados = $statement1->fetchAll();

        foreach ($resultados as $keyss) {

            $cadena_stickers = $cadena_stickers ." ". $keyss[0];

        }

        return ltrim($cadena_stickers, $cadena_stickers[0]);
    }
    
    


    require 'views/catalogo.view.php';

?>