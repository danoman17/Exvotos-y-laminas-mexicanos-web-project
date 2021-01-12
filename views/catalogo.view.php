<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/fdd2e8457c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/catalogueStyles.css">
	<title>Catalogo</title>
</head>
<body>


	<header>
		<div class="heder">
			<div class="logo_h izquierda">
				<a href="#"><img src="http://localhost/ExvotosMexicanos/img/Em.jpg" alt="" class="imagen_logo"></a>
				<div class="nombre_header">Láminas y Exvotos Mexicanos</div></a>
			</div>
			<div class="derecha">
				<ul>
					<li><a href="#" id="btn-home"><i class="icono fas fa-home"></i>Inicio</a></li>
					<li><a href="#" id="btn-sobremi"><i class="icono far fa-user"></i>Sobre mi</a></li>
					<li><a href="#" id="btn-ubiacacion"><i class="icono fas fa-map-marker-alt"></i>Ubicación</a></li>
					<li><a href="#" id="btn-contacto"><i class="icono fas fa-inbox"></i>Contacto</a></li>
					<li><a href="http://localhost/ExvotosMexicanos/views/catalogo.view.php" id="btn-catalogo"><i class="icono fas fa-palette"></i>Catálogo</a></li>
				</ul>
			</div>
		</div>
	</header>



	<div class="contenedor">
		<div class="logo">
			<h1>Catálogo</h1>
			<p>Laminas y Exvotos Mexicanos</p>
		</div>

		<form action="">
			<input type="text" class="barra-busqueda" id="barra-busqueda" placeholder="buscar">
		</form>

		<div class="categorias" id="categorias">
			<a href="#" class="activo">Todo</a>
			<a href="#">Exvotos</a>
			<a href="#">Otros</a>
		</div>
	


	<section class="grid" id="grid">


		<div class="item" 
			data-categoria="exvotos" 
			data-etiquetas="ciudades autos carros calles"
			data-descripcion="1.- askldjalskjdalñskjd aslkdjalskjd"
		>
			<div class="item-contenido">
				<img src="../img/ciudad1.png" alt="">
			</div>
		</div>


		<div class="item" 
			data-categoria="otros" 
			data-etiquetas="personas mujeres"
			data-descripcion="2.- askldjalskjdalñskjd aslkdjalskjd"
		>
			<div class="item-contenido">
				<img src="../img/persona3.png" alt="">
			</div>
		</div>

		<div class="item" 
			data-categoria="exvotos" 
			data-etiquetas="personas mujeres"
			data-descripcion="3.- askldjalskjdalñskjd aslkdjalskjd"
		>
			<div class="item-contenido">
				<img src="../img/persona2.png" alt="">
			</div>
		</div>

		<div class="item" 
			data-categoria="otros" 
			data-etiquetas="paisajes arboles bosques"
			data-descripcion="4.- askldjalskjdalñskjd aslkdjalskjd"
		>
			<div class="item-contenido">
				<img src="../img/paisaje2.png" alt="">
			</div>
		</div>

		<div class="item" 
			data-categoria="exvotos" 
			data-etiquetas="paisajes playas mar"
			data-descripcion="5.- askldjalskjdalñskjd aslkdjalskjd"
		>
			<div class="item-contenido">
				<img src="../img/paisaje1.png" alt="">
			</div>
		</div>

		<div class="item" 
			data-categoria="otros" 
			data-etiquetas="plantas verde naturaleza"
			data-descripcion="6.- askldjalskjdalñskjd aslkdjalskjd"
		>
			<div class="item-contenido">
				<img src="../img/naturaleza1.png" alt="">
			</div>
		</div>

		<div class="item" 
			data-categoria="exvotos" 
			data-etiquetas="mar nubes edificios"
			data-descripcion="7.- askldjalskjdalñskjd aslkdjalskjd"
		>
			<div class="item-contenido">
				<img src="../img/ciudad2.png" alt="">
			</div>
		</div>

		<div class="item" 
			data-categoria="otros" 
			data-etiquetas="pandas blanco negro"
			data-descripcion="8.- askldjalskjdalñskjd aslkdjalskjd"
		>
			<div class="item-contenido">
				<img src="../img/animal2.png" alt="">
			</div>
		</div>

		<div class="item" 
			data-categoria="exvotos" 
			data-etiquetas="leones pelos felinos"
			data-descripcion="9.- askldjalskjdalñskjd aslkdjalskjd"
		>
			<div class="item-contenido">
				<img src="../img/animal1.png" alt="">
			</div>
		</div>


		
	</section>


	<section class="overlay" id="overlay">
		<div class="contenedor-img">
			<button id="btn-cerrar-popup"><i class="fas fa-times"></i></button>
			<img src="" alt="">
		</div>
		<p class="descripcion"></p>
	</section>


	</div>




	<script src="https://cdn.jsdelivr.net/npm/web-animations-js@2.3.2/web-animations.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/muuri@0.9.3/dist/muuri.min.js"></script>
	<script src="../js/catalogoGaleria.js"></script>
	
	


</body>
</html>