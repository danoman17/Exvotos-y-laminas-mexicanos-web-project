<?php session_start();

require '../funciones.php';
$conexion = conexion();


if(isset($_SESSION['usuario'])){

   
    
    $signal = false;  //Inicializamos la variable para el popup


    //Traemos de la bd el resutlado de los datos pasados por GET.
    $id_obj = $_GET['id'];
    $name_obj = $_GET['name'];


    //Hacemos la consulta.
    $stmt1 = $conexion->prepare('SELECT * FROM product WHERE idProduct = :id and workName = :nameWork');
    $stmt1->execute(array(
        ':id' => $id_obj,
        ':nameWork' => $name_obj
    ));

    $result_obj = $stmt1->fetch();


    //Traemos todas las categorias que existen en la DB.

    $stmt2 = $conexion->prepare('SELECT * FROM category');
    $stmt2->execute();
    $result_category = $stmt2->fetchAll();


    //Nombre de la categoria especifica.

    $stmt3 = $conexion->prepare('SELECT category FROM category WHERE idCategory = :idCat');
    $stmt3->execute(array(
        ':idCat' => $result_obj['1']
    ));

    $resul_cat_spec = $stmt3->fetch();


    //Seeparamos el valor del precio.

    $cost = $result_obj['4'];
    $porciones = explode(".", $cost);
    $unities = $porciones[0]; // unidades
    $cents = $porciones[1]; // centavos



    $img_rute = "../img/".$result_obj['2']; //creamos la ruta completa de la imagen del objeto.


    //treamos todos los stickers relacionados con el objeto

    $stmt4 = $conexion->prepare('SELECT * FROM stickers WHERE idProduct = :idP');
    $stmt4->execute(array(
        ':idP' => $result_obj['0']
    ));
    $resul_stickers = $stmt4->fetchAll();

    
    //Actualizamos en la DB los datos actualizados.
    
    //comprobamos que el metodo sea a traves del metodo POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Inicializacmos los mensaje de errores.
        $em = '';

        $id_prod_principal = $_POST['id']; //id del producto (obtenido con un input de EditPanel.view.php)
        
        //Este caso es cuando la imagen NO esta seteada.
        if(!file_exists($_FILES['my_image']['tmp_name']) && !is_uploaded_file($_FILES['my_image']['tmp_name']))
        {
            
                //Traemos los valores del form 
                $nombre = limpiarDatos(filter_var($_POST['nombre'], FILTER_SANITIZE_STRING));
                $Categoria = limpiarDatos(filter_var(strtolower($_POST['ddl_categoria']), FILTER_SANITIZE_STRING));
                $descripcion = limpiarDatos(filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING));
                $pesos = limpiarDatos(filter_var(strtolower($_POST['pesos']), FILTER_SANITIZE_STRING));    
                $centavos = limpiarDatos(filter_var(strtolower($_POST['cents']), FILTER_SANITIZE_STRING));
                $precio = "$pesos.$centavos";

                $number = count($_POST["name"]);
                
                /*impresion de datos*/ 

                // echo $nombre ."\n";
                // echo $Categoria ."\n";
                // echo $descripcion ."\n";
                // echo $precio ."\n";
            
              //insertamos a la db los datos del formulario.


              $stmt2 = $conexion->prepare('UPDATE product SET idCategory=:cat, workName=:nombre, workPrice=:precio, workDescription=:descrip WHERE idProduct = :idProd');
              $stmt2->execute(array(
                  ':cat' => $Categoria,
                  ':nombre' => $nombre,
                  ':precio' => $precio,
                  ':descrip' => $descripcion,
                  ':idProd' => $id_prod_principal
              ));
              
              
              //borramos todos los stickers antes de volver a modificar


              $stmt5 = $conexion->prepare('DELETE FROM stickers WHERE idProduct = :idProd');
              $stmt5->execute(array(
                  ':idProd' => $id_prod_principal
              ));
              
              
              //validación de etiquetas

              
              if($number > 0){
                  for ($i=0; $i < $number; $i++) { 
                      
                      if (trim($_POST["name"][$i])  != '') {

                          //insertar a la tabla stickers las etiquetas.
                          $stmt6 = $conexion->prepare('INSERT INTO stickers (idProduct, sticker) VALUES (:idP, :stick)');
                          $stmt6->execute(array(
                              ':idP' => $id_prod_principal,
                              ':stick' => $_POST["name"][$i]
                          ));
                      }
                  }
                  
              }
              else
              {
                  echo "Enter a name";
              }

              $signal = true;
              
            
        }
        //este es el caso cuando esta seteada la imagen.
        elseif(file_exists($_FILES['my_image']['tmp_name']) || is_uploaded_file($_FILES['my_image']['tmp_name']))
        {
            

            //Iniciamos el proceso para poder validar la imagen subida y guardarla.
            $imgName = $_FILES['my_image']['name']; //nombre del archivo
            $imgSize = $_FILES['my_image']['size']; //tamaño del archivo
            $tmp_name = $_FILES['my_image']['tmp_name']; //nombre temporal
            $error = $_FILES['my_image']['error']; //errores

            //Traemos el nombre de la imagen antes de cambiarla
            $stmt7 = $conexion->prepare('SELECT imgPath FROM product WHERE idProduct = :idProd2');
            $stmt7->execute(array(
                ':idProd2' => $id_prod_principal
            ));
            $link_image_del = $stmt7->fetch();
            //----------------------------------------------    
        
            if ($error === 0) 
            {
                if ($imgSize > 5000000) 
                {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("La imagen es demasiado grande.");'; 
                    echo 'window.location.href = "modProd.php";';
                    echo '</script>';
                    
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


                            $stmt2 = $conexion->prepare('UPDATE product SET idCategory=:cat, imgPath=:thumb, workName=:nombre, workPrice=:precio, workDescription=:descrip WHERE idProduct = :idProd');
                            $stmt2->execute(array(
                                ':cat' => $Categoria,
                                ':thumb' => $new_img_name,
                                ':nombre' => $nombre,
                                ':precio' => $precio,
                                ':descrip' => $descripcion,
                                ':idProd' => $id_prod_principal
                            ));
                            
                            
                            //borramos todos los stickers antes de volver a modificar


                            $stmt5 = $conexion->prepare('DELETE FROM stickers WHERE idProduct = :idProd');
                            $stmt5->execute(array(
                                ':idProd' => $id_prod_principal
                            ));
                            
                            
                            //validación de etiquetas

                            
                            if($number > 0){
                                for ($i=0; $i < $number; $i++) { 
                                    
                                    if (trim($_POST["name"][$i])  != '') {

                                        //insertar a la tabla stickers las etiquetas.
                                        $stmt6 = $conexion->prepare('INSERT INTO stickers (idProduct, sticker) VALUES (:idP, :stick)');
                                        $stmt6->execute(array(
                                            ':idP' => $id_prod_principal,
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

                                //borramos de la carpeta la imagen anterior.
                                unlink("../img/" . $link_image_del['0']);


                                $signal = true;
                             

                    }
                    else 
                    {
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Archivo no permitido");'; 
                        echo 'window.location.href = "modProd.php";';
                        echo '</script>';
                    }
                }
            } 
            else 
            {
                echo '<script type="text/javascript">'; 
                echo 'alert("Error inesperado.");'; 
                echo 'window.location.href = "modProd.php";';
                echo '</script>';
                
            }

         
 

        }
        
        
        
        
    }


    require '../views/EditPanel.view.php';
}else {
    header('Location:login.php');
} 

?>