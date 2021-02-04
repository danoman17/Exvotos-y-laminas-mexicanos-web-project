<?php session_start();

require '../funciones.php';
$conexion = conexion('exvotos_laminas_mx', 'root', 'java0900');


if(isset($_SESSION['usuario'])){

    //Traemos todos los items de productos.
    $stmt1 = $conexion->prepare('SELECT * FROM product');
    $stmt1->execute();
    $all_items = $stmt1->fetchAll();
    

    require '../views/delProd.view.php';
}else {
    header('Location:login.php');
} 

?>