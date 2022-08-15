

// function cambiar_genero(select)
// {
//     //declaramos la variable

//     // var mujer, hombre, lgtbiqa;
//     mujer = document.getElementById('mujer').value;
//     hombre = document.getElementById('hombre').value;
//     lgtbiqa = document.getElementById('lgtbiqa').value;
//     indefinido = document.getElementById('indefinido').value;
// }


//creamos la funcion que validara si los campos rellenados cumplen los requisitos
function validar(){

    //declaramos las variables con el valor que se va a introducir
    var nombre, apellidos, telefono, email;
    nombre = document.getElementById('nombre').value;
    apellidos = document.getElementById('apellidos').value;
    telefono = document.getElementById('telefono').value;
    email = document.getElementById('email').value;

    expresion = /\w+@\w+\.+[a-z]/;
    valContra =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

    if (nombre === "" || apellidos === "" || telefono === "" || email === ""){
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
        else if (apellidos.length > 40){
            alert("El apellido es muy largo");
            return false;
        }
        else if (!/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+$/i.test(apellidos)){
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
        else if (!expresion.test(email)) {
            alert("El correo no es valido");
            return false;
        }
}