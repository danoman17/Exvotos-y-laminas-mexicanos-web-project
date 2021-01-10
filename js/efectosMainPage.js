//Menu effect

$(document).ready(function(){
	$(' header  .derecha a').each(function(index, elemento){
		$(this).css({
			'top' : '-100px'
		});

		$(this).animate({
			top :'0'
		}, 1500 + (index * 500));
	});
});

//Logo header effect


if( $(window).width() > 800 ){
	$('header .contenedor .logo img').css({
		opacity : 0,
		marginTop: '100px'
	});

	$('header .contenedor .logo img').animate({
		opacity : 1,
		marginTop : '5px'
	}, 1500);


	$('header .contenedor .logo .nombre_header').css({
		opacity : 0,
		marginTop : '100px'
	});

	$('header .contenedor .logo .nombre_header').animate({
		opacity : 1,
		marginTop : '15px'
	}, 1500);


	//Home/"Inicio" effects

	$('.seccion1 .hoja1 .intro').css({
		opacity : 0,
		
	});

	$('.seccion1 .hoja1 .intro').animate({
		opacity : 1,
	},1500);


	$('.seccion1 .hoja1 .intro .contenido_intro').css({
		opacity : 0,
		marginTop : '200px'
	});

	$('.seccion1 .hoja1 .intro .contenido_intro').animate({
		opacity : 1,
		marginTop : 0
	},2000);


	$('.seccion1 .hoja1 .imagenes ').css({
		opacity: 0,
		marginTop: '200px'
	});

	$('.seccion1 .hoja1 .imagenes ').animate({
		opacity: 1,
		marginTop: 0
	},2000);


	$('.seccion1 .boton1').css({
		opacity: 0
	});

	$('.seccion1 .boton1').animate({
		opacity: 1
	},2000);

}


// scroll menu elements

var homePage = $('#Primera-seccion').offset().top,
	sobremi = $('#btn-sobremi').offset().top,
	ubicacion = $('#btn-ubiacacion').offset().top,
	contacto = $('#btn-contacto').offset().top,
	first_button = $('#btn-1').offset().top
	socond_button = $('#btn-2').offset().top;

$('#btn-home').on('click',function(e){
	e.preventDefault();
	$('html, body').animate({
		scrollTop : 100
	},500);
});

$('#btn-sobremi').on('click',function(e){
	e.preventDefault();
	$('html, body').animate({
		scrollTop : 1040
	},500);
});

$('#btn-ubiacacion').on('click',function(e){
	e.preventDefault();
	$('html, body').animate({
		scrollTop : 1980
	},500);
});

$('#btn-contacto').on('click',function(e){
	e.preventDefault();
	$('html, body').animate({
		scrollTop : 2920
	},500);
});

$('#btn-1').on('click',function(e){
	e.preventDefault();
	$('html, body').animate({
		scrollTop : 1040
	},500);
});


$('#btn-2').on('click',function(e){
	e.preventDefault();
	$('html, body').animate({
		scrollTop : 1980
	},500);
});



