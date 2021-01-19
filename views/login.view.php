<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/fdd2e8457c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/loginAdmin.css">
    <title>Iniciar Sesion</title>
</head>
<body>
    <div class="contenedorGeneral">

		<div class="contenedor">
			<h3>LOGIN</h3>
			<i class="far fa-user-circle"></i>

			<form name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario">
				<input type="text" class="usuario" name="usuario" placeholder="Usuario">
				<input type="password" class="password_btn" name="password" placeholder="Contraseña">
				<input type="submit" value="Entrar">
	
				<?php if(!empty($errores)): ?>
					<div class="error">
						<ul>
							<?php echo $errores; ?>
						
						</ul>
					</div>

				<?php endif;?>
			</form>
			
			<a href="">
				<p class="olvidoPass">
					Olvide mi constraseña
				</p>
			</a>

		</div>

    </div>
</body>
</html>