<?php
require '../PHP/bd.php';
?>
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
                        <li class="header_navegacion">
                            <a href="../views/login_BCRYPT.php" id="estoy">login</a>
                        </li>
                    </ul>
                </div>
    </header>
        <main id="main-login">
            <!--datos necesarios para que-->
            <div id="login">
                <?php
                    session_start();
                    if(@$_SESSION["valido"]!="SI"){
                        include("formulario_BCRYPT.php");
                            // /echo 'No fucionna';
                        }else{
                            header('Location: usuario/usuario_home.php');
                            }
                ?>
                <br>
                    <a href="nuevo_user_BCRYPT.php">Nuevo</a>
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
                            © 2022 CMD Mosca <a href="">· Términos y condiciones</a> <a href="">· Cookies </a> <a href="">· Política de privacidad</a>
                        </div>
            </footer>

     <!-- Script con JQuery y AJAX para verificar el login -->

                <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
                <script>
                    $(document).ready(function(){
                        $("enviar").click(function(){
                            var user=$("#usuario").val();
                            var pass=$("#password").val();

                            var datos=$("#login-formulario").serialize();

                            var url="verificarlogin.php";
                            var dataTye="html";

                                $.ajax({
                                    type:"POST",
                                    url:url,
                                    data:datos,

                                    success:function(data){
                                        if(data==0){
                                            $("#respuesta").html("Usuario o contraseña incorrecto")
                                        }else{
                                            $(location).attr('href', 'login_BCRYPT.php');
                                        }
                                    },
                                    dataType: DataType
                                });
                        });
                    });
                </script> -->


</body>
</html>