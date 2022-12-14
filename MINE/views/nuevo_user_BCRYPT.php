<?php include('../PHP/metodos.php') ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cmdmosca | login</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
</head>

<body>
    <header>
        <!--Aqui va a ir la el logotipo principal y la navegacion entre paginas-->
            <!--logotipo principal-->
            <div id="header-logo">
                <img src="../assets/svg/logo.svg" alt="logo comando mosca" id="img-logo">
            </div>
            <!--navegacion entre paginas-->
                <div id="header-menu">
                    <ul>
                        <li class="header-navegacion">
                            <a href="../index.html">Inicio</a>
                        </li>
                        <li class="header-navegacion">
                            <a href="../views/galeria_dinamica.html">Galeria</a>
                        </li>
                        <li class="header-navegacion">
                            <a href="../views/presupuesto.html">Presupuesto</a>
                        </li>
                        <li class="header-navegacion">
                            <a href="../views/contacto.html">Contacto</a>
                        </li>
                        <li class="header-navegacion">
                            <a href="../views/usuario/usuario_noticias.php">Noticias</a>
                        </li> 
                        <li class="header_navegacion">
                            <a href="../views/login_BCRYPT.php" id="estoy">Login</a>
                        </li>
                    </ul>
                </div>
    </header>
        <main id="main-login">
            <!--datos necesarios para que-->
            <div id="login">
                <form action="nuevo_user_BCRYPT.php" method="post">
                <?php echo display_error(); ?>
                    <!--datos cliente / users_data-->
                        Nombre <br>
                            <input type="text" name="nombre" id="nombre"
                            size="15" autocomplete="given-name" placeholder="Su nombre" pattern="[A-Za-z]{3-15}" ><br>
                        Apellidos <br>
                            <input type="text" name="apellidos" id="apellidos"
                            size="40" autocomplete="family-name" placeholder="Sus apellidos"  pattern="[A-Za-z]{3-40}" ><br>
                        Email <br>
                            <input type="email" name="email" id="email"
                            multiple autocomplete="email" placeholder="Su email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br>
                        Telefono <br>
                            <input type="tel" name="telefono" id="telefono"
                            size="9" autocomplete="tel" placeholder="Su telefono" ><br>
                        Fecha de nacimiento <br>
                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" ><br>
                        Direccion <br>
                            <input type="text" name="direccion" id="direccion" ><br>
                        genero <br>
                            <!-- <input type="text" name="genero" id="genero" required><br> -->
                            <select name="genero" >
                            <!-- onchange="cambiar_genero(this)" -->
                                <option type="text" id="mujer" value="mujer"  selected>Mujer</option>
                                <option type="text" id="hombre" value="hombre" >Hombre</option>
                                <option type="text" id="lgtbiqa" value="lgtbiqa" >lgtbiqa+</option>
                                <option type="text" id="indefinido" value="indefinido" >indefinido</option>
                            </select>
                            <br>
                            <!--datos cliente / users_login-->
                                Usuario <span id="respuesta"></span><br>
                                <input type="text" name="usuario" id="usuario" required><br>
                                Contrase??a <br>
                                    <input type="password" name="password" id="password" required><br></br>
                                    <!--boton de envio-->
                                        <!-- <input type="submit" value="Acceder" onclick="validar(this.form);"> -->
                                        <button type="submit" class="btn" name="register_btn">login</button>
                </form>
            </div>
        </main>
            <footer>
                <!--Aqui van a ir el apartado de cookis, redes sociales y direccion de la empresa-->
                    <!--Redes sociales-->
                    <div id="footer-redes">
                            <a href="https://www.twitch.tv/cmdmosca">
                                <img src="../assets/svg/redes-03.svg" class="footer-redes-logo" alt="icono twitch">
                            </a>
                            <a href="https://www.youtube.com/channel/UCPvkjdF2-u2qwJirXD_FMGw">
                                <img src="../assets/svg/redes-05.svg" class="footer-redes-logo" alt="icono youtube">
                            </a>
                            <a href="https://www.instagram.com/cmdmosca/">
                                <img src="../assets/svg/redes-01.svg" class="footer-redes-logo" alt="icono instagram">
                            </a>
                            <a href="https://twitter.com/cmdmosca">
                                <img src="../assets/svg/redes-04.svg" class="footer-redes-logo" alt="icono twitter">
                            </a>
                            <a href="https://www.facebook.com/search/top?q=cmdmosca%20mosca">
                                <img src="../assets/svg/redes-02.svg" class="footer-redes-logo" alt="icono facebook">
                            </a>
                        </div>
                    <!--Direccion de la empresa-->
                        <div id="footer-empresa">
                            <a href="https://goo.gl/maps/KtDiZRMUc2LX58Cm9">Carrer de Jordi Villalonga i Velasco, 6, 07010 Palma, Illes Balears</a>
                        </div>
                    <!--Artado de cookis-->
                        <div id="footer-cookis">
                            ?? 2022 CMD Mosca <a href="">?? T??rminos y condiciones</a> <a href="">?? Cookies </a> <a href="">?? Pol??tica de privacidad</a>
                        </div>
            </footer>

<!-- // Script con JQuery y AJAX para comprobar AL ABANDONAR EL CAMPO (FOCUSOUT) si el usuario esta disponible -->

            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <script>
                    $(document).ready(function(){
                        $("#usuario").focusout(function(){
                            var datos = 'usuario='+$("#usuario").val();
                            var url = "../PHP/validar.php";
                            var dataType = "html" ;

                            $.ajax({
                                type: "POST",
                                url: url,
                                data: datos,

                                success: function(data){
                                    if(data == 0){
                                        $('#respuesta').html("El usuario ya existe");
                                    }else{
                                        $('#respuesta').html("El usuario esta disponible");
                                    }
                                },
                                dataType:dataType
                            });
                        });
                    });
                    </script>
                    <script src="../js/formulario.js"></script>

</body>
</html>