<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/fdd2e8457c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/configAdminStyles.css">
    <title>Document</title>
</head>
<body>
    
    <div class="contenedorGeneral">

        <header>
            
                <div class="indices">
                    <ul>
                        <li class="encabezado">Menu</li>
                        <li><a href="../admin/configAdmin.php" id="btn-sobremi"><i class="fas fa-user"></i>Configuración<i class="fas fa-caret-right flecha_derecha"></i></a></li>
                        <li><a href="#" id="btn-ubiacacion"><i class="fas fa-plus-square"></i>Nuevo<i class="fas fa-caret-right flecha_derecha"></i></a></li>
                        <li><a href="#" id="btn-contacto"><i class="fas fa-edit"></i>Modificar<i class="fas fa-caret-right flecha_derecha"></i></a></li>
                        <li><a href="#" id="btn-catalogo"><i class="fas fa-eraser"></i>Eliminar<i class="fas fa-caret-right flecha_derecha"></i></a></li>
                        <li><a href="../admin/cerrar.php" id="btn-catalogo"><i class="fas fa-sign-out-alt"></i>Cerrar Sesión<i class="fas fa-caret-right flecha_derecha"></i></a></li>
                    </ul>
                </div>

        </header>


        <div class="contenido">
            <div class="tarj">
                <h1>Editar mi Perfil</h1>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" method="POST">
                        <div class="elemento">
                            <p>Nombre</p>
                            <input type="text" class="casillatext" name="nombre" value="<?php echo ucfirst($resultado['userName']);?>">
                        </div>
                        
                        <div class="elemento">
                            <p>Apellido Paterno</p>
                            <input type="text" class="casillatext" name="AP" value="<?php echo ucfirst($resultado['userSurname']);?>">
                        </div>

                        <div class="elemento">
                            <p>Apellido Materno</p>
                            <input type="text" class="casillatext" name="AM" value="<?php echo ucfirst($resultado['userSecondSurname']);?>">
                        </div>

                        <div class="elemento">
                            <p>Email</p>
                            <input type="email" class="casillatext" name="correo" value="<?php echo $resultado['email'];?>">
                        </div>

                        <div class="elemento">
                            <p>Nueva contraseña</p>
                            <input type="password" name="pass1" class="casillatext">
                        </div>

                        <div class="elemento">
                            <p>Confirmar nueva contraseña</p>
                            <input type="password" name="pass2" class="casillatext">
                        </div>

                        <input type="submit" class="botonEditar" value="Actualizar">
                </form>

                <?php if(!empty($error)):?>
                <div class="errores">
                    <ul>
                        <?php echo $error;?>
                    </ul>

                </div>
                <?php endif;?>
            </div>
        
            
            <?php if($signal == true):?>
                <div class="confirmation">
                    <p>Los datos se han actualziado correctamente !</p>
                    <i class="fas fa-times" id="close"></i>
                </div>
            <?php  endif;?>
        </div>

    </div>


    <script>
        document.getElementById("close").addEventListener("click", function(){
            document.querySelector(".contenedorGeneral .contenido .confirmation").style.display = "none";
        })

    </script>

    	
		
</body>
</html>