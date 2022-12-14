<?php
include('../../PHP/metodos.php');
session_start();

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	// echo "WARNING: not an admin";
	// Return that USER or ILLEGAL ACCESSOR to main page
	// Devuelve al infractor a la pagina de inicio o login
	header('location: ../login_BCRYPT.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['usuario']);
	header("location: ../login_BCRYPT.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cmdmosca | user</title>
    <link rel="stylesheet" href="../../css/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
	<!-- <style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	</style> -->
</head>
<body>
	<header>
	<!--Aqui va a ir la el logotipo principal y la navegacion entre paginas-->
		<!--logotipo principal-->
		<div id="header-logo">
			<img src="../../assets/svg/logo.svg" alt="logo comando mosca" id="img-logo">
		</div>
	<!--navegacion entre paginas-->
		<div id="header-menu">
			<ul>
				<li class="header-navegacion">
					<a href="../../index.html">Inicio</a>
				</li>
				<li class="header-navegacion">
					<a href="../../views/galeria_dinamica.html">Galeria</a>
				</li>
				<li class="header-navegacion">
					<a href="../../views/presupuesto.html">Presupuesto</a>
				</li>
				<li class="header-navegacion">
					<a href="../../views/contacto.html">Contacto</a>
				</li>
				<li class="header-navegacion">
          			<a href="../../views/usuario/usuario_noticias.php">Noticias</a>
        		</li> 
				<li class="header-navegacion">
					<a href="../../views/admin/admin_home.php" id="estoy">Login</a>
				</li>
			</ul>
		</div>
    </header>
	<!-- Aqui creamos la barra de navegacion de admin -->
	<div id="usuario-cabecera">
		<ul>
			<li class="header-navegacion">
				<a href="admin_panel_citas.php">Citas</a>
			</li>
			<li class="header-navegacion">
				<a href="admin_panel_noticias.php">Noticias</a>
			</li>
			<li class="header-navegacion">
				<a href="admin_perfil.php">Perfil</a>
			</li>
			<li>
			&nbsp; <a href="admin_panel_usuarios.php">Usuarios</a>
			</li>
			<li>
				<a href="admin_home.php?logout='1'" style="color: red;">Cerrar sesion</a>
			</li>
		</ul>
</div>
	<main id="main-login">
        <div id="login">
			<!-- <div class="header"> -->
				<h2>Bienvenido a cmdmosca!</h2>


			<!-- </div> -->
			<div class="content">


				<!-- logged in usuario information -->
				<div class="profile_info">
					<!-- <img src="../images/admin_profile.png"  > -->

					<div>
						<?php  if (isset($_SESSION['usuario'])) : ?>
							<strong><?php echo $_SESSION['usuario']; ?></strong>

							<small>
								<i  style="color: #00ff79;">(<?php echo ucfirst($_SESSION['rol']); ?>)</i>
								<br></br>
								<!-- <a href="admin_home.php?logout='1'" style="color: red;">logout</a>
							&nbsp; <a href="admin_panel_usuarios_crear.php"> + add usuario</a>
													&nbsp; <a href="admin_modificar_usuario.php"> + ver usuario</a>
							</small> -->
						<?php endif ?>

						<div id="imagen-home-gif">
							<img src="../../assets/gif/mosca.gif">
						</div>
					</div>
				</div>
			</div>
	</div>
    </main>
	<footer>
        <!--Aqui van a ir el apartado de cookis, redes sociales y direccion de la empresa-->
            <!--Redes sociales-->
                <div id="footer-redes">
                    <a href="https://www.twitch.tv/cmdmosca">
                        <img src="../../assets/svg/redes-03.svg" class="footer-redes-logo" alt="icono twitch">
                    </a>
                    <a href="https://www.youtube.com/channel/UCPvkjdF2-u2qwJirXD_FMGw">
                        <img src="../../assets/svg/redes-05.svg" class="footer-redes-logo" alt="icono youtube">
                    </a>
                    <a href="https://www.instagram.com/cmdmosca/">
                        <img src="../../assets/svg/redes-01.svg" class="footer-redes-logo" alt="icono instagram">
                    </a>
                    <a href="https://twitter.com/cmdmosca">
                        <img src="../../assets/svg/redes-04.svg" class="footer-redes-logo" alt="icono twitter">
                    </a>
                    <a href="https://www.facebook.com/search/top?q=cmdmosca%20mosca">
                        <img src="../../assets/svg/redes-02.svg" class="footer-redes-logo" alt="icono facebook">
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
</body>
</html>