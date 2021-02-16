<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/fdd2e8457c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/delProdStyles.css">
    <link rel="shortcut icon" type="image/jpg" href="../img/Em_icono.ico"/>
    <title>Document</title>
</head>
<body>
    
    <div class="contenedorGeneral">

    <?php include '../views/header_admin.html'; ?>
    

        <div class="contenido">
            <h2>Modificar un objeto.</h2>
            <!-- barra de busqueda -->

            <?php 
            
                $busqueda = strtolower($_REQUEST['busqueda']);
                if(empty($busqueda)){
                    header('Location: ../admin/delProd.php');
                }
            
            ?>

            <form action="../admin/search_obj_del.php" method="get">
            <input type="text" placeholder ="Busqueda de nombre" class ="barra_busqueda" id="barra_busqueda" name="busqueda" value="<?php echo $busqueda;?>">
            <input type="submit" value="Buscar" class="btn_search">
            </form>

            <div class="container_tables">

               <table>

                    <tr>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th>IMAGEN</th>
                        <th>PRECIO</th>
                        <th></th>
                    </tr>   

                    <?php foreach($all_items as $items):?>
                        
                        <tr>
                            
                            <td><?php echo $items['3'];?></td>
                            <td><?php echo $items['5'];?></td>
                            <td>
                                <img src="../img/<?php echo $items['2'];?>" alt="" id="imagen">
                                <label for="imagen">
                                     <div class="btn_img">Ver Imagen</div> 
                                </label>
                            </td>
                            <td> $ <?php echo $items['4'];?></td>
                            <td><a href="../admin/delProd.php?name=<?php echo $items['3'];?>&id=<?php echo $items['0'];?>"> <div class="btn_edit">Eliminar</div> </a></td>
                        </tr>

                   <?php endforeach;?>
               </table>
            </div>

            <div class="overlay">
                <div class="overlay-inner">
                    <img src="" alt="">
                    <button class="close">X</button>
                </div>
            </div>
        </div>

       

    </div>


    	
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../js/search_obj_del.js"></script>

		
</body>
</html>