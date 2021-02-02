<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/fdd2e8457c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/modProdStyles.css">
    <title>Document</title>
</head>
<body>
    
    <div class="contenedorGeneral">

    <header>
            
            <div class="indices">
                <ul>
                    <li class="encabezado">Menu</li>
                    <li><a href="../admin/configAdmin.php" id="btn-sobremi"><i class="fas fa-user"></i>Configuración<i class="fas fa-caret-right flecha_derecha"></i></a></li>
                    <li><a href="../admin/nuevoProd.php" id="btn-ubiacacion"><i class="fas fa-plus-square"></i>Nuevo<i class="fas fa-caret-right flecha_derecha"></i></a></li>
                    <li><a href="../admin/modProd.php" id="btn-contacto"><i class="fas fa-edit"></i>Modificar<i class="fas fa-caret-right flecha_derecha"></i></a></li>
                    <li><a href="../admin/delProd.php" id="btn-catalogo"><i class="fas fa-eraser"></i>Eliminar<i class="fas fa-caret-right flecha_derecha"></i></a></li>
                    <li><a href="../admin/cerrar.php" id="btn-catalogo"><i class="fas fa-sign-out-alt"></i>Cerrar Sesión<i class="fas fa-caret-right flecha_derecha"></i></a></li>
                </ul>
            </div>

    </header>

        <div class="contenido">
            <h2>Modificar un objeto.</h2>
            
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
                            <td><a href=""> <div class="btn_edit">Editar</div> </a></td>
                        </tr>

                   <?php endforeach;?>
               </table>
            </div>

            <div class="overlay">
                <div class="overlay-inner">
                    <button class="close">Cerrar</button>
                    <img src="" alt="">
                </div>
            </div>
        </div>

       

    </div>


    	
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script>
            const button = document.querySelectorAll('.btn_img');
            const overlay = document.querySelector('.overlay');
            const overlayImage = document.querySelector('.overlay-inner img');

            function open(a){
                overlay.classList.add('open');
                const src = a.target.parentNode.parentNode.querySelector('img').src;
                console.log(src);

                overlayImage.src = src;
            }

            function close(){
                overlay.classList.remove('open');
            }
            button.forEach(button => button.addEventListener('click', open));
            overlay.addEventListener('click',close);


            // console.log(overlay);
        </script>
		
</body>
</html>