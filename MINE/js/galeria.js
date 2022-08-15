function cargar(){
    console.log('dentro');

    $.ajax({
        url:'../js/json/img-galeria.json',
        
        type:'GET',
        success:function(datos){
            console.log('ok');
            objeto_json = datos;
            var cadena = '';
            for (i=0;i<objeto_json.caja_imagenes.length;i++){
                cadena = cadena + ' <br>'+
                objeto_json.caja_imagenes[i].url + '<br>';
            }
            $('#main-galeria').html(cadena);
        },
        error:function(xhr,status){
            alert('no se carga la imagen');
        }
    })
};