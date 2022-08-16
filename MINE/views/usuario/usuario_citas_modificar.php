<?php
//include ("../../PHP/bd.php");
include ("../../PHP/metodos_admin.php");
//session_start();

$s_motivo = "";
$s_fecha_cita = "";
$s_idCitas = "";


// receive id by button
rellenar_datos($_POST['editar_cita']);

function rellenar_datos($id){

  global $mysqli;

  global $s_motivo;
  global $s_fecha_cita;
  global $s_idCitas;

  // selec user where ID = post received

  $query = "SELECT idCitas, idUser, fecha_cita, motivo FROM citas WHERE idCitas = $id";

  // if (mysqli_query($mysqli, $query)) {
  //   echo "Record updated successfully<br>";
  // } else {
  //   echo "Error reading record: " . mysqli_error($mysqli);
  // }
  $result=$mysqli->query($query);
  $data = mysqli_fetch_assoc($result);

  $s_fecha_cita = $data['fecha_cita'];
  $s_motivo = $data['motivo'];
  $s_idCitas = $data['idCitas'];

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
                    <a href="../views/rellenarNoticias.php">Noticias</a>
                </li> 
				<li class="header-navegacion">
					<a href="../../views/admin/admin_home.php" id="estoy">Login</a>
				</li>
			</ul>
		</div>
    </header>
	<!-- Aqui creamos la barra de navegacion de admin -->
	<div id="usuario-cabecera-usuario">
    <ul>
			<li class="header-navegacion">
				<a href="usuario_citas.php" id="aqui2">Citas</a>
			</li>
			<li class="header-navegacion">
				<a href="usuario_noticias.php">Noticias</a>
			</li>
			<li class="header-navegacion">
				<a href="usuario_perfil.php">Perfil</a>
			</li>
			<li>
				<a href="usuario_home.php?logout='1'" style="color: red;">Cerrar sesion</a>
			</li>
		</ul>
</div>
<main id="main-login">


  <div id="login">
  <h2>Modificar cita</h2>
  <br>
    <!-- // show data on inputs -->
    <form action="usuario_citas_modificar.php" method="post" id="datos_usuario">
      <p>ID</p>
      <input type="text" value="<?php echo $s_idCitas ?>" name="idCitas">
      <p>Fecha</p>
      <input type="date" name="fecha" id="fechaCita"
      size="15" autocomplete="given-name" value="<?php echo $s_fecha_cita; ?>" required>
      <p>Motivo</p>
      <input type="text" value="<?php echo $s_motivo; ?>" name="motico">

      <input type="submit" value="Registrar datos" id="enviar" name="btn_actualizar_cita">
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