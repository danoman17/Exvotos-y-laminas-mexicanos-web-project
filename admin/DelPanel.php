<?php session_start();

require '../funciones.php';
$conexion = conexion();


if(isset($_SESSION['usuario'])){

    //Traemos todos los items de productos.
    $stmt1 = $conexion->prepare('SELECT * FROM product');
    $stmt1->execute();
    $all_items = $stmt1->fetchAll();
    

    
    $id = $_GET['id'];
    $name = $_GET['name'];

    $stmt1 = $conexion->prepare('SELECT imgPath FROM product WHERE idProduct = :id'); 
    $stmt1->execute(array(
        ':id' => $id
    ));

    $img_thumb = $stmt1->fetch();


    
    $stmt2 = $conexion->prepare('DELETE FROM product WHERE idProduct = :id AND workName= :nameP');
    $stmt2->execute(array(
        ':id' => $id,
        ':nameP' => $name
    ));

    unlink("../img/" . $img_thumb['0']); //borramos la imagen de la carpeta

    
    header('Location: delProd.php'); 
        

       



}else {
    header('Location:login.php');
} 

?>

