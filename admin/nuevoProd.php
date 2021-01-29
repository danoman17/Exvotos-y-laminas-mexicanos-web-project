<?php session_start();

require '../funciones.php';
$conexion = conexion('exvotos_laminas_mx', 'root', 'java0900');



if(isset($_SESSION['usuario'])){
    //Inicializacmos los mensaje de errores.
    $em = "";

    //Hacemos consulta para poder traer de la DB las categorias totales

    $stmt1 = $conexion->prepare('SELECT * FROM category');
    $stmt1->execute();
    $category = $stmt1->fetchAll();

    


    //comprobamos que el metodo sea a traves del metodo POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Iniciamos el proceso para poder validar la imagen subida y guardarla.
        $imgName = $_FILES['my_image']['name']; //nombre del archivo
        $imgSize = $_FILES['my_image']['size']; //tamaño del archivo
        $tmp_name = $_FILES['my_image']['tmp_name']; //nombre temporal
        $error = $_FILES['my_image']['error']; //errores
        
        if(isset($_POST['submit']) && isset($_FILES['my_image']))
        {
            if ($error === 0) 
            {
                if ($imgSize > 5000000) 
                {
                    echo "Sorry, your file is too large";

                } 
                else 
                {
                    $img_ex = pathinfo($imgName, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg", "jpeg", "png"); //array de extensiones permitidas.

                    if (in_array($img_ex_lc, $allowed_exs)) 
                    {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = '../img/'.$new_img_name;
                        
                        //Guardamos la imagen en la ruta correspondiente.
                        //move_uploaded_file($tmp_name, $img_upload_path);
                    } 
                    else 
                    {
                        echo "You can't upload files of this type";
                    }
                }
            } 
            else 
            {
                echo "Unknown error ocurred!";
            }


            $nombre = limpiarDatos(filter_var($_POST['nombre'], FILTER_SANITIZE_STRING));
            $Categoria = limpiarDatos(filter_var(strtolower($_POST['ddl_categoria']), FILTER_SANITIZE_STRING));
            $descripcion = limpiarDatos(filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING));
            $pesos = limpiarDatos(filter_var(strtolower($_POST['pesos']), FILTER_SANITIZE_STRING));    
            $centavos = limpiarDatos(filter_var(strtolower($_POST['cents']), FILTER_SANITIZE_STRING));
            $precio = "$pesos.$centavos";
            $number = count($_POST["name"]);

            // echo $nombre ."\n";
            // echo $Categoria ."\n";
            // echo $descripcion ."\n";
            // echo $precio ."\n";


            if($number > 0){
                for ($i=0; $i < $number; $i++) { 
                    if (trim($_POST["name"][$i])  != '') {
                        echo $_POST["name"][$i] . "\n";
                    }
                }
            }
            else
            {
                echo "Enter a name";
            }         


            
        }


        

    }


    require '../views/nuevoProd.view.php';
}else {
    header('Location:login.php');
} 

?>