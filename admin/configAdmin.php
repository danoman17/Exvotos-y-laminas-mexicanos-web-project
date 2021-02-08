<?php session_start();

require '../funciones.php';
$conexion = conexion();



if (isset($_SESSION['usuario'])) {

    $error = "";

	$statement = $conexion->prepare('SELECT * FROM admin WHERE idUser = :id ');

	$statement->execute(array(
		':id' => $_SESSION['usuario']
	));

    $resultado = $statement->fetch();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = limpiarDatos(filter_var(strtolower($_POST['nombre']), FILTER_SANITIZE_STRING));
        $ApellidoP = limpiarDatos(filter_var(strtolower($_POST['AP']), FILTER_SANITIZE_STRING));
        $ApellidoM = limpiarDatos(filter_var(strtolower($_POST['AM']), FILTER_SANITIZE_STRING));
        $email = limpiarDatos(filter_var(strtolower($_POST['correo']), FILTER_SANITIZE_STRING));

        $password = $_POST['pass1'];
        $password2 = $_POST['pass2'];
        
        
        $id_sesion = $_SESSION['usuario'];


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

        $validar_pass = true;

        if (!empty($password)) {
            $validar_pass = false;
        }

        $signal = false;
        
        if(($flag_campos && $flag_pass) && ($validar_pass)) {
            
            
            $stmt = $conexion->prepare  ('UPDATE admin
            SET userName=:nombre, 
                userSurname=:AP, 
                userSecondSurname=:AM,
                email=:correo
            WHERE idUser=:id');

            $stmt->execute(array(
                ':nombre'=>$name,
                ':AP'=>$ApellidoP,
                ':AM'=>$ApellidoM,
                ':correo'=>$email,
                ':id'=> $id_sesion
            ));

            //echo "se ha hecho la actualización.";
            $signal = true;


        }elseif (($flag_campos && $flag_pass) && !($validar_pass)) {
            $password = hash('sha512',$password);
            

            $stmt = $conexion->prepare  ('UPDATE admin
            SET userName=:nombre, 
                userSurname=:AP, 
                userSecondSurname=:AM,
                email=:correo,
                userPass=:passw
            WHERE idUser=:id');

            
            $stmt->execute(array(
                ':nombre'=>$name,
                ':AP'=>$ApellidoP,
                ':AM'=>$ApellidoM,
                ':correo'=>$email,
                ':id'=> $id_sesion,
                'passw'=>$password
            ));

            //echo "Se hace la actualizacion pero con contraseña";
            $signal = true;
        }






    }





	require '../views/configAdmin.view.php';
} else {
	header('Location: login.php');
	die();
}



?>