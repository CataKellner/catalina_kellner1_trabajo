<?php
include('../../PHP/bd.php');
include('../../PHP/metodos_admin.php');
$query = "SELECT idUser, nombre, apellidos, email, direccion, telefono, genero FROM users_data";
$result=$mysqli->query($query);
// $result = mysqli_query($mysqli, $query);
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
				<a href="admin_panel_noticias.php">Noticias</a>
			</li> 
			<li class="header-navegacion">
				<a href="admin_perfil.php">Perfil</a>
			</li> 
			<li>
				<a href="admin_home.php?logout='1'" style="color: red;">Cerrar sesion</a>
			</li>
			<li>
			&nbsp; <a href="admin_crear_usuario.php"> + add usuario</a>
			</li>
			<li>
			&nbsp; <a href="admin_modificar_usuario.php"> + ver usuario</a>
			</li>                               
		</ul>    
  </div>
    <main id="main-login">
      <div id="login">
        <table border ="1" cellspacing="0" cellpadding="10">
          <tr>
            <th>S.N</th>
            <th>userID </th>
            <th>Nombre</th>
            <th>Surname</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>Address</th>
          </tr>
          <?php
          if (mysqli_num_rows($result) > 0) {
            $sn=1;
            while($data = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <!-- include button -->

            <!-- <td><input type="submit" value="Ver todos" name="refrescar"></td> -->
            <td><?php echo $sn; ?> </td>
            <td><form action="admin_usuarios.php" method="post" id="btn_standard"><input type="submit"
              value="<?php echo $data['idUser'] ?>" name="editar_usuario"></td>
            <td><?php echo $data['nombre']; ?> </td>
            <td><?php echo $data['apellidos']; ?> </td>
            <td><?php echo $data['genero']; ?> </td>
            <td><?php echo $data['email']; ?> </td>
            <td><?php echo $data['telefono']; ?> </td>
            <td><?php echo $data['direccion']; ?> </td>
          <tr>
          <?php
            $sn++;}} else { ?>
              <tr>
              <td colspan="8">No data found</td>
              </tr>
          <?php } ?>
            </table>
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
