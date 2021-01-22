<?php session_start();

require '../funciones.php';
$conexion = conexion('exvotos_laminas_mx', 'root', 'java0900');



if (isset($_SESSION['usuario'])) {

    $error = "";

	$statement = $conexion->prepare('SELECT * FROM admin WHERE userName = :name ');

	$statement->execute(array(
		':name' => $_SESSION['usuario']
	));

    $resultado = $statement->fetch();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = limpiarDatos(filter_var(strtolower($_POST['nombre']), FILTER_SANITIZE_STRING));
        $ApellidoP = limpiarDatos(filter_var(strtolower($_POST['AP']), FILTER_SANITIZE_STRING));
        $ApellidoM = limpiarDatos(filter_var(strtolower($_POST['AM']), FILTER_SANITIZE_STRING));
        $email = limpiarDatos(filter_var(strtolower($_POST['correo']), FILTER_SANITIZE_STRING));

        $password = $_POST['pass1'];
        $password2 = $_POST['pass2'];
        
        

        $flag_campos = true;
        if(empty($name) || empty($ApellidoP) || empty($ApellidoM) || empty($email) ){
            $flag_campos = false;
            $error .= "<li>Por favor, rellene todos los campos.</li>";
        }


        $flag_pass = true;

        if($password !== $password2){
            $flag_pass = false;
            $error .= "<li>Las contraseñas no coinciden.</li>";
        }

        if($flag_campos && $flag_pass) {
            //echo "se hace la actualizacion :D";
            $password = hash('sha512',$password);
            $stmt = $conexion->prepare  ('UPDATE FROM admin VALUES(:)');
        } 



    }





	require '../views/configAdmin.view.php';
} else {
	header('Location: login.php');
	die();
}



?>