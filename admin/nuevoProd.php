<?php session_start();

require '../funciones.php';
$conexion = conexion('exvotos_laminas_mx', 'root', 'java0900');



if(isset($_SESSION['usuario'])){
    //Inicializacmos los mensaje de errores.
    $em = '';

    //Inicializamos la variable para el popup

    $signal = false;

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
                    $em .= "<li>La imagen es demasiado grande.</li>";

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


                           //Traemos los valores del form 
                        $nombre = limpiarDatos(filter_var($_POST['nombre'], FILTER_SANITIZE_STRING));
                        $Categoria = limpiarDatos(filter_var(strtolower($_POST['ddl_categoria']), FILTER_SANITIZE_STRING));
                        $descripcion = limpiarDatos(filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING));
                        $pesos = limpiarDatos(filter_var(strtolower($_POST['pesos']), FILTER_SANITIZE_STRING));    
                        $centavos = limpiarDatos(filter_var(strtolower($_POST['cents']), FILTER_SANITIZE_STRING));
                        $precio = "$pesos.$centavos";

                        //Variable para saber cuantas casillas dinamicas hay
                        $number = count($_POST["name"]);





                            /*impresion de datos*/ 

                            // echo $nombre ."\n";
                            // echo $Categoria ."\n";
                            // echo $descripcion ."\n";
                            // echo $precio ."\n";
                            // echo $new_img_name . "\n";

                            //insertamos a la db los datos del formulario.
                            $stmt2 = $conexion->prepare('INSERT INTO product (idCategory, imgPath, workName, workPrice, workDescription) VALUES(:cat, :thumb, :nombre, :precio, :descrip)');
                            
                            $stmt2->execute(array(
                                ':cat' => $Categoria,
                                ':thumb' => $new_img_name,
                                ':nombre' => $nombre,
                                ':precio' => $precio,
                                ':descrip' => $descripcion
                            ));

            

                            //obtenemos el ID de la obra que se subió.

                            $stmt4 = $conexion->prepare('SELECT idProduct FROM product WHERE 
                                                        product.idCategory = :cat1 and
                                                        product.imgPath = :thumb1');
                            
                            $stmt4->execute(array(
                                ':cat1' => $Categoria,
                                ':thumb1' => $new_img_name
                            ));

                            $current_id_prod_arr = $stmt4->fetch();

                            //extraemos el ID del array
                            $current_id_prod = $current_id_prod_arr[0];


        
                            //validación de etiquetas
                            if($number > 0){
                                for ($i=0; $i < $number; $i++) { 
                                    if (trim($_POST["name"][$i])  != '') {

                                        //echo $_POST["name"][$i] . "\n";


                                        //insertar a la tabla stickers las etiquetas.
                                        $stmt3 = $conexion->prepare('INSERT INTO stickers (idProduct, sticker) VALUES(:id, :stick)');
                                        $stmt3->execute(array(
                                            ':id' => $current_id_prod,
                                            ':stick' => $_POST["name"][$i]
                                        ));
                                    }
                                }
                            }
                            else
                            {
                                echo "Enter a name";
                            }         




                        
                        //Guardamos la imagen en la ruta correspondiente.
                        move_uploaded_file($tmp_name, $img_upload_path);
                        $signal = true;
                    } 
                    else 
                    {
                        $em .= "<li>No se permite este tipo de extensión como imágen.</li>";
                    }
                }
            } 
            else 
            {
                $em .= "<li>Error inesperado.</li>";
            }

         

            
        }


        

    }


    require '../views/nuevoProd.view.php';
}else {
    header('Location:login.php');
} 

?>