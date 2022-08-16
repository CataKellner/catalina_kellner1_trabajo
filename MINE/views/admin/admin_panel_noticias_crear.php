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
					<a href="../../views/admin/admin_home.php" id="estoy">Login</a>
				</li>
			</ul>
		</div>
    </header>
	<!-- Aqui creamos la barra de navegacion de admin -->
	<div <div id="usuario-cabecera">
		<ul>
			<li class="header-navegacion">
				<a href="admin_panel_citas.php">Citas</a>
			</li>
			<li class="header-navegacion">
				<a href="admin_panel_noticias.php" id="aqui">Noticias</a>
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
      <h2>Crear noticas</h2>


<form method="post"  enctype="multipart/form-data" action="crear_noticia.php">
	<table>
	<tr>
		<td width="250">Name</td>
		<td>
		<input name="titulo" type="text" id="fname" />
		</td>
	</tr>
	<!-- <tr>
	<td width="250">Email: (will not be publicized)</td>
	<td>
	<input name="email" type="text" id="email" /><br />
	</td>
	</tr> -->
	<!-- <tr>
	<td width="250">Client Type</td>
	<td id="mainselection">
	<select name="type" id="type">
		<option></option>
		<option value="Residential">Residential</option>
		<option value="Business">Business</option>

	</select> -->
	</td>
	</tr>
	<tr>
		<td width="250">Comments</td>
		<td>
		<textarea id="content" name="texto" rows="10" cols="50" style="border-style:groove;box-shadow: none;"placeholder="Please describe your experience" required></textarea>
		</td>
	</tr>

	<tr>
		<td width="250">Image</td>
		<td>
		<input name="file" type="file" id="archivo">
		</td>
	</tr>

	<tr>
		<td width="250"> </td>
		<td>
		<input name="add" type="submit" id="add" value="Add Testimonial">
		</td>
	</tr>
</table>
</form>

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
                    © 2022 CMD Mosca <a href="">· Términos y condiciones</a> <a href="">· Cookies </a> <a href="">· Política de privacidad</a>
                </div>
    </footer>
</body>
</html>