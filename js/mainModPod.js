$(buscar_datos());


function buscar_datos(consulta){
    $.ajax({
        url: '../admin/modProd.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })

    .done(function(respuesta) {
        console.log("succes");
        $("#holass").html(respuesta);
    })
    .fail(function() {
        console.log("error");
    })
}


$(document).on('keyup','#barra_busqueda', function(){
    var valor = $(this).val();
    if(valor != ""){
        buscar_datos(valor);
    }else {
        buscar_datos();
    }
});