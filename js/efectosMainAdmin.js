//Menu effect

$(document).ready(function(){
	$(' .contenedorGeneral .contenido h2').each(function(index, elemento){
		$(this).css({
			'top' : '-500px'
		});

		$(this).animate({
			top :'0'
		}, 1500 + (index * 500));
	});
});
