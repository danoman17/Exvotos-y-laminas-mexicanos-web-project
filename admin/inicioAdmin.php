<?php 
session_start();


require '../funciones.php';

$conexion = conexion();


if (isset($_SESSION['usuario'])) {

	$statement = $conexion->prepare('SELECT userName, userSurname FROM admin WHERE idUser = :id ');

	$statement->execute(array(
		':id' => $_SESSION['usuario']
	));

	$resultado = $statement->fetch();

	$nameUser = ucfirst($resultado['userName']);
	$surnameUser = ucfirst($resultado['userSurname']);

	require '../views/inicioAdmin.view.php';
} else {
	header('Location: login.php');
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