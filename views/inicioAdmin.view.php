<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/fdd2e8457c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/adminStyles.css">
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
            <h2>
                ¡ Bienvenido, <br>    
                        <?php echo  "$nameUser $surnameUser  !"; ?>
            </h2>

        </div>

    </div>


    	
		<script src="../js/jquery-3.5.1.min.js"></script>
		<script src="../js/efectosMainAdmin.js"></script>
</body>
</html>