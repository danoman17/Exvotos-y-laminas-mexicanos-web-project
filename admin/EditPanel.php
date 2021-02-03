<?php session_start();

require '../funciones.php';
$conexion = conexion('exvotos_laminas_mx', 'root', 'java0900');


if(isset($_SESSION['usuario'])){

    //Traemos de la bd el resutlado de los datos pasados por GET.

    $id_obj = $_GET['id'];
    $name_obj = $_GET['name'];

    //Hacemos la consulta.
    $stmt1 = $conexion->prepare('SELECT * FROM product WHERE idProduct = :id and workName = :nameWork');
    $stmt1->execute(array(
        ':id' => $id_obj,
        ':nameWork' => $name_obj
    ));
    
    $result_obj = $stmt1->fetch();


    //Traemos todas las categorias que existen en la DB.

    $stmt2 = $conexion->prepare('SELECT * FROM category');
    $stmt2->execute();
    $result_category = $stmt2->fetchAll();


    //Nombre de la categoria especifica.

    $stmt3 = $conexion->prepare('SELECT category FROM category WHERE idCategory = :idCat');
    $stmt3->execute(array(
        ':idCat' => $result_obj['1']
    ));

    $resul_cat_spec = $stmt3->fetch();


    //Seeparamos el valor del precio.

    $cost = $result_obj['4'];
    $porciones = explode(".", $cost);
    $unities = $porciones[0]; // unidades
    $cents = $porciones[1]; // centavos


    //creamos la ruta completa de la imagen del objeto.

    $img_rute = '../img/'.$result_obj['2'];

    require '../views/EditPanel.view.php';
}else {
    header('Location:login.php');
} 

?>