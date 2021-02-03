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
        
    <?php include '../views/header_admin.html'; ?>


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