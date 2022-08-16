<?php
//include ("../../PHP/bd.php");
include ("../../PHP/metodos_admin.php");
//session_start();

$s_Nombre = "";
$s_Apellidos = "";
$s_Email = "";
$s_Direccion = "";
$s_Telefono = "";
$s_Genero = "";

// receive id by button
// echo $_POST['editar_usuario'];
rellenar_datos($_POST['editar_usuario']);

function rellenar_datos($id){

  global $mysqli;

  global $s_Nombre;
  global $s_Apellidos;
  global $s_Email;
  global $s_Direccion;
  global $s_Telefono;
  global $s_Genero;
  // selec user where ID = post received

  $query = "SELECT idUser, nombre, apellidos, email, fecha_nacimiento, direccion, telefono, genero FROM users_data WHERE idUser = $id";
  $result=$mysqli->query($query);
  $data = mysqli_fetch_assoc($result);
  $s_Nombre = $data['nombre'];
  $s_Apellidos = $data['apellidos'];
  $s_Email =$data['email'] ;
  $s_Direccion =$data['direccion'] ;
  $s_fecha_nacimiento =$data['fecha_nacimiento'] ;
  $s_Telefono = $data['telefono'];
  $s_Genero =$data['genero'] ;
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
			&nbsp; <a href="admin_panel_usuarios.php" id="aqui">Usuarios</a>
			</li>
			<li>
				<a href="admin_home.php?logout='1'" style="color: red;">Cerrar sesion</a>
			</li>
		</ul>
</div>
<main id="main-login">


  <div id="login">
  <h2>Moificar citas</h2>

<!-- // show data on inputs -->
      <form action="admin_panel_usuarios_modificar.php" method="post" id="datos_usuario">
        <p>Identificador</p>
        <input type="text" value="<?php echo $_POST['editar_usuario']; ?>" name="idUser">
        <p>Nombre</p>
        <input type="text" name="nombre" id="nombre"
        size="15" autocomplete="given-name" value="<?php echo $s_Nombre; ?>" placeholder="Su nombre" pattern="[A-Za-z]{3-15}" required>
        <p>Apellidos</p>
        <input type="text" value="<?php echo  $s_Apellidos; ?>" name="apellidos" required>
        <p>Telefono</p>
        <input type="text" value="<?php echo $s_Telefono; ?>" name="telefono">
        <p>Email</p>
        <input type="text" value="<?php echo $s_Email; ?>" name="email" required>
        <p>Nacimiento</p>
        <input type="date" value="<?php echo $s_fecha_nacimiento; ?>" name="fecha_nacimiento" id="fecha_nacimiento">
        <p>Direccion</p>
        <input type="text" value ="<?php echo $s_Direccion; ?>" name="direccion" id="direccion" ><br>
        <p>Genero</p>
        <select name="genero">
            <option type="text" id="mujer" value="mujer"  selected>Mujer</option>
            <option type="text" id="hombre" value="hombre" >Hombre</option>
            <option type="text" id="lgtbiqa" value="lgtbiqa" >lgtbiqa+</option>
            <option type="text" id="indefinido" value="indefinido" >indefinido</option>
        </select>
        <br></br>
        <input type="submit" value="Registrar datos" id="enviar" name="btn_actualizar_datos_usuario">
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