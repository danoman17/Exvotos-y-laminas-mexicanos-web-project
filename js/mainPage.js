$(document).ready(function(){

	$(window).scroll(function(){
		var windowWidth = $(window).width();

		if(windowWidth > 1024) {
			var scroll = $(window).scrollTop();

			$('.intro').css({
				'transform' : 'translate(-'+scroll/20+'%, 0px)'
			});

			$('.imagenes .caja1').css({
				'transform' : 'translate('+scroll / 18 +'px , 0px)'
			});

			$('.imagenes .caja2').css({
				'transform' : 'translate('+scroll / 18 +'px , 0px)'
			});

			$('.seccion1 .boton1').css({
				'transform' : 'translate(0px, '+ scroll / 10+'%)'
			});			

		}
	});
});