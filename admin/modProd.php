<?php session_start();

require '../funciones.php';
$conexion = conexion();


if(isset($_SESSION['usuario'])){

    //Traemos todos los items de productos.
    $stmt1 = $conexion->prepare('SELECT * FROM product');
    $stmt1->execute();
    $all_items = $stmt1->fetchAll();
    

    require '../views/modProd.view.php';
}else {
    header('Location:login.php');
} 

?>