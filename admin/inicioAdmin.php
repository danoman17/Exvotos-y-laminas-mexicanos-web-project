<?php 
session_start();


require '../funciones.php';

$conexion = conexion('exvotos_laminas_mx', 'root', 'java0900');



if (isset($_SESSION['usuario'])) {
    header('Location: inicioAdmin.php');
    die();
}




















#codigo que neceistamos en para setear otra password para el usuario final.
// $pass = "java0900";
// $pass = hash('sha512',$pass);


// $stmt = $conexion->prepare('UPDATE admin SET userPass = :pass WHERE idUser = 1');
// $stmt->execute(array(
//     ':pass' => $pass
// ));






?>