<?php
include ("metodos_admin.php");

// receive id by button
if(isset($_POST["editar_usuario"])){
  rellenar_datos($_POST['idUser']);
}

function rellenar_datos(){

  // selec user where ID = post received
  $query = "SELECT idUser, nombre, apellidos, email, direccion, telefono, genero FROM users_data";
  $result=$mysqli->query($query);
  $data = mysqli_fetch_assoc($result);
// if (mysqli_num_rows($result) > 0) {
//   $sn=1;
//   while($data = mysqli_fetch_assoc($result)) {$sn++;}
// }
//   else {}
}

?>

<!-- // show data on inputs -->
<form action="admin_usuarios.php" method="post" id="datos_usuario">'
  <p>ID</p>');
  <input type="text" value="<?php echo $data['idUser'] ?>" name="idUser">'
  <p>Nombre</p>');
  <input type="text" name="nombre" id="nombre"
  size="15" autocomplete="given-name" value="<?php echo $data['nombre']; ?>" placeholder="Su nombre" pattern="[A-Za-z]{3-15}" >'
  <p>Apellidos</p>');
  <input type="text" value="<?php echo $data['apellidos']; ?>" name="apellidos">'
  <p>Telefono</p>');
  <input type="text" value="<?php echo $data['telefono']; ?>" name="telefono">'
  <p>Nacimiento</p>');
  <input type="date" value="<?php echo $data['fecha_nacimiento']; ?>" name="fecha_nacimiento" id="fecha_nacimiento">'
  <p>Direccion</p>');
  <input type="text" value ="<?php echo $data['direccion']; ?>" name="direccion" id="direccion" ><br>'
  <p>Genero</p>'
  <select name="genero">
      <option type="text" id="mujer" value="mujer"  selected>Mujer</option>
      <option type="text" id="hombre" value="hombre" >Hombre</option>
      <option type="text" id="lgtbiqa" value="lgtbiqa" >lgtbiqa+</option>
      <option type="text" id="indefinido" value="indefinido" >indefinido</option>
  </select>
  <br>');
  <input type="submit" value="Registrar datos" id="enviar" name="btn_actualizar_datos_usuario">'
  </form>'