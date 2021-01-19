<?php session_start();

// Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if(isset($_SESSION['usuario'])) {
	header('Location: inicioAdmin.php');
	die();
} else {
	// Enviamos al usuario al formulario de registro
	header('Location: login.php');
}

?>