<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/fdd2e8457c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/adminStyles.css">
    <link rel="shortcut icon" type="image/jpg" href="../img/Em_icono.ico"/>
    <title>Document</title>
</head>
<body>
    
    <div class="contenedorGeneral">

        <input type="checkbox" id="check" >
		<label for="check" class="check_btn">
		    <i class="fas fa-bars"></i>
		</label>

    <?php include '../views/header_admin.html'; ?>

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