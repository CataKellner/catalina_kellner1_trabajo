function cargar() {
    console.log('dentro');

    $.ajax({
        url: './js/json/noticias.json',
        
        type: 'GET',
        success:function(datos) {
            console.log ('ok');
            object_json = datos;
            var cadena = '';
            for (i=0;i<object_json.noticia.length;i++){
                cadena = cadena + ' <br>'+
                object_json.noticia[i].titulo + '<br>';
                cadena = cadena + ''+
                object_json.noticia[i].parrafo + '<br>';
            }
            $('#main-noticias').html(cadena);
        },
            error: function (xhr,status){
                alert('perdona no se cargan las noticias');
            }
    })
};