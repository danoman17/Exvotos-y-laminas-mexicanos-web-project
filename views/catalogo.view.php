<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/fdd2e8457c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/catalogueStyles.css">
	<title>Catalogo</title>
</head>
<body>


	<header>
		<div class="heder">
			<div class="logo_h izquierda">
				<a href="index.php"><img src="http://localhost/ExvotosMexicanos/img/Em.jpg" alt="" class="imagen_logo"></a>
				<div class="nombre_header">Láminas y Exvotos Mexicanos</div></a>
			</div>
			<div class="derecha">
				<ul>
					<li><a href="index.php" id="btn-home"><i class="icono fas fa-home"></i>Inicio</a></li>
					
				</ul>
			</div>
		</div>
	</header>



	<div class="contenedor">
		<div class="logo">
			<h1>Catálogo</h1>
			<p>Láminas y Exvotos Mexicanos</p>
		</div>

		<form action="">
			<input type="text" class="barra-busqueda" id="barra-busqueda" placeholder="Buscar color, elementos, nombre...">
		</form>

		<div class="categorias" id="categorias">
			<a href="#" class="activo">Todo</a>
			<a href="#">Exvotos</a>
			<a href="#">Otros</a>
		</div>
	


	<section class="grid" id="grid">

		<?php foreach($prod_stmt as $producto_real): ?>

			<?php $stickers_cad = etiquetas($producto_real['0'], $conexion); ?> 

			<div class="item" 
				data-categoria="<?php echo $producto_real['category']; ?>" 
				data-etiquetas="<?php echo $stickers_cad; ?>"
				data-descripcion="<?php echo $producto_real['workDescription']; ?>"
				data-nombre="<?php echo $producto_real['workName']; ?>"
				data-precio="<?php echo $producto_real['workPrice']; ?>"

			>
				<div class="item-contenido">
					<img src="img/<?php echo $producto_real['imgPath']; ?>" alt="">
				</div>

				<div class="nombre-img">
					<p><?php echo $producto_real['workName']; ?></p>
				</div>
			</div>

	   <?php endforeach;?>
		
	</section>


	<section class="overlay" id="overlay">
		<div class="contenedor-img">
			<button id="btn-cerrar-popup"><i class="fas fa-times"></i></button>
			<img src="" alt="">
		</div>

		<div class="contenedor">

			<p class="subtitulos">Nombre: </p>
			<p class="nombre"></p>
			<p class="subtitulos">Descripción: </p>
			<p class="descripcion"></p>
			<p class="subtitulos">Precio: </p>
			<p class="precio"></p>

		</div>
	</section>


	</div>





		<footer>
		
			<div class="texto_footer">
				<h2>
					Láminas y Exvotos <br>
					Mexicanos
				</h2>
			</div>
			

			<div class="footer_2">
				<a href="https://www.facebook.com/exvotosylaminasMexicanas" target="_blank">
					<div class="face">
						<i class="fab fa-facebook-f"></i>
					</div>
				</a>

				<a href="https://www.instagram.com/exvotos_mexicanos/" target="_blank">
					<div class="insta">
						<i class="fab fa-instagram"></i>
					</div>
				</a>
			</div>


			<div class="pie_pagina">
				<p>
					Copyright © 2021 Daniel Flores R. All rights reserved.
				</p>
			</div>
		</footer>





	<script src="https://cdn.jsdelivr.net/npm/web-animations-js@2.3.2/web-animations.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/muuri@0.9.3/dist/muuri.min.js"></script>
	<script src="js/catalogoGaleria.js"></script>
	
	


</body>
</html>