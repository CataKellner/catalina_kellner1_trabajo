//definir variables
var precioTotal = document.getElementById("precio_Final_HTML");

var precio_Servicio = 0;
var precio_Descuento = 0;
var porcentaje_Descuento = 0;
var precio_Extra = 0;
var precio_Final = 0;

function cambiar_servicio(select)
{
    // Extraer "value" o precio del servicio
    var valor_Servicio = parseInt(select.options[select.selectedIndex].value);
    // Sumar el valor y el precio extra
    precio_Final = valor_Servicio + precio_Extra;

    // Imprimir el precio en pantalla
    actualizar_precio();
}

// Funcion para añadir o sustraer.
function modificar_precio(element)
{
    // Valor del servicio
    var valor_adicional = parseInt(element.value);

    // Accion en funcion de activar / desactivar un elemento de opcion
    if(element.checked)
    {
        // Sumamos el valor al precio
        console.log("Sumado " + valor_adicional);
        // Sumar a precio extra acumulado
        precio_Extra = precio_Extra + valor_adicional;
        // Sumar a precio final   
        precio_Final = precio_Final + valor_adicional;
    }
    else
    {
        // Restamos el valor al precio
        console.log("Restado " + valor_adicional);
        precio_Extra = precio_Extra - valor_adicional;   
        precio_Final = precio_Final - valor_adicional;
    }

    console.log("Precio extra acumulado: " + precio_Extra);

    // Llamamos a la funcion que efectivamente actualiza el precio en pantalla
    actualizar_precio();
}

// Actualiza el precio
function actualizar_precio()
{
    console.log("Precio Final: " + precio_Final);
    
    var precio_Redondo = precio_Final.toFixed(2);

    // textContent en vez de innerHTML
    precioTotal.textContent = precio_Redondo.toString();
} 

// Si pongo numero 
function modificar_Semanas(semana)
{
    console.log("trabaja");

    var valorSemana = semana.value;

    console.log("descuento guardado " + precio_Descuento);

    precio_Final = precio_Final + precio_Descuento;
    
    console.log("precio descuento deshecho " + (precio_Final + precio_Descuento));

    if(valorSemana >= 1 && valorSemana <= 2){
        // 1 a 2 no descuentes
        porcentaje_Descuento = 0;

        console.log("Prcntaje actualizado " + porcentaje_Descuento);
    }
    // 2 > 4 descuenta 15% a precio_Final
    else if(valorSemana >= 3 && valorSemana <= 4){

        porcentaje_Descuento = 15;

        console.log("Prcntaje actualizado " + porcentaje_Descuento);
    }
    // 4 > 8 descunta 40%  a precio_Final
    else if(valorSemana >= 5 && valorSemana <= 8){

        porcentaje_Descuento = 40;

        console.log("Prcntaje actualizado " + porcentaje_Descuento);
    }

    precio_Descuento = porcentaje_Descuento * 0.01 * precio_Final;

    console.log("Cantidad de descuento final " + precio_Descuento);

    precio_Final = precio_Final - precio_Descuento;

    actualizar_precio();
}

// Los datos de contacto cumplan los requisitos de validacion a la hora de enviar.
function validar(){
    var nombre, apellido, telefono, email;
    nombre = document.getElementById('nombre').value;
    apellido = document.getElementById('apellido').value;
    telefono = document.getElementById('telefono').value;
    email = document.getElementById('email').value;

    expresion = /\w+@\w+\.+[a-z]/;
    valContra =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

    if (nombre === "" || apellido === "" || telefono === "" || email === ""){
        alert ("Todos los campos son obligatios");
        return false;
    }
        else if (nombre.length > 15){
            alert("El nombre es muy largo");
            return false;
        }
        else if (!/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+$/i.test(nombre)){
            alert ("El nombre solo puede contener letras");
            return false;
        }
        else if (apellido.length > 40){
            alert("El apellido es muy largo");
            return false;
        }
        else if (!/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+$/i.test(apellido)){
            alert ("El apellido solo puede contener letras");
            return false;
        }
        else if (telefono.length > 9){
            alert("El telefono es muy largo");
            return false;
        }
        else if (isNaN(telefono)) {
            alert("El teléfono ingresado no es un número");
            return false;
        }
        else if (!expresion.test(correo)) {
            alert("El correo no es valido");
            return false;
        }     
}

// Checkbox 

function aceptoCondiciones() {
    var x = document.getElementById("acepta").ariaRequired;
    document.getElementById("demo").innerHTML = x;
}