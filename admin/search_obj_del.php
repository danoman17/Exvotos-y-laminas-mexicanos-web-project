<?php session_start();

require '../funciones.php';
$conexion = conexion();


if(isset($_SESSION['usuario'])){

    //Traemos todos los items de productos.
    $stmt1 = $conexion->prepare("SELECT * FROM product WHERE workName LIKE ?");
    $stmt1->execute(array("%".$_GET['busqueda']."%"));
    $all_items = $stmt1->fetchAll();
    

    require '../views/search_obj_del.view.php';
}else {
    header('Location:login.php');
} 

?>