<?php
//include ("../../PHP/bd.php");
include ("../../PHP/metodos_admin.php");
//session_start();

$s_idNoticias = "";
$s_titulo = "";
$s_imagen = "";
$s_texto = "";
$s_fecha = "";
$s_idUser = "";


// receive id by button
rellenar_datos($_POST['editar_noticia']);

function rellenar_datos($id){

  global $mysqli;

  global $s_idNoticias;
  global $s_titulo;
  global $s_imagen;
  global $s_texto;
  global $s_fecha;
  global $s_idUser;

  // selec user where ID = post received

  $query = "SELECT idNoticias, titulo, imagen, texto, fecha, idUser FROM noticias WHERE idNoticias = $id";

  // if (mysqli_query($mysqli, $query)) {
  //   echo "Record updated successfully<br>";
  // } else {
  //   echo "Error reading record: " . mysqli_error($mysqli);
  // }
  $result=$mysqli->query($query);
  $data = mysqli_fetch_assoc($result);

  $s_idNoticias = $data['idNoticias'];
  $s_titulo = $data['titulo'];
  $s_imagen = "";
  $s_texto = $data['texto'];
  $s_fecha = $data['fecha'];
  $s_idUser = $data['idUser'];

// if (mysqli_num_rows($result) > 0) {
//   $sn=1;
//   while($data = mysqli_fetch_assoc($result)) {$sn++;}
// }
//   else {}

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
					<a href="../../views/admin/admin_home.php" id="estoy">login</a>
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
				<a href="admin_panel_noticias.php" id="estoy">Noticias</a>
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
  <h2>Moificar Noticia</h2>


    <!-- // show data on inputs -->
    <form action="admin_panel_noticias_modificar.php" method="post" id="datos_usuario">
      <p>Identificador</p>
      <input type="text" value="<?php echo $s_idNoticias ?>" name="idNoticias">
      <p>Titulo</p>
      <input type="date" name="fecha" id="fechaCita" value="<?php echo $s_fecha; ?>" >
      <!-- <p>Imagen</p> -->
      <!-- <input type="text" value="" name="motivo"> -->
      <p>Texto</p>
      <input type="text" value="<?php echo $s_texto; ?>" name="motivo">
      <p>Fecha</p>
      <input type="text" value="<?php echo $s_fecha; ?>" name="motivo">
      <p>Autor</p>
      <input type="text" value="<?php echo $s_idUser; ?>" name="motivo">

      <input type="submit" value="Registrar datos" id="enviar" name="btn_actualizar_noticia">
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