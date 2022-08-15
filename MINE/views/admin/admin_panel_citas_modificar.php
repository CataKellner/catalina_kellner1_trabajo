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
rellenar_datos($_POST['editar_cita']);

function rellenar_datos($id){

  global $mysqli;

  global $s_Nombre;
  global $s_Apellidos;
  global $s_Email;
  global $s_Direccion;
  global $s_Telefono;
  global $s_Genero;
  // selec user where ID = post received

  $query = "SELECT idCitas, idUser, fecha_cita, motivo FROM citas WHERE idUser = $id";
  $result=$mysqli->query($query);
  $data = mysqli_fetch_assoc($result);
  $s_fecha_cita = $data['fecha_cita'];
  $s_motivo = $data['motivo'];

// if (mysqli_num_rows($result) > 0) {
//   $sn=1;
//   while($data = mysqli_fetch_assoc($result)) {$sn++;}
// }
//   else {}

}

?>
<!-- // show data on inputs -->
<form action="admin_panel_citas_modificar.php" method="post" id="datos_usuario">
  <p>ID</p>
  <input type="text" value="<?php echo $s_Nombre ?>" name="idUser">
  <p>Fecha</p>
  <input type="date" name="nombre" id="nombre"
  size="15" autocomplete="given-name" value="<?php echo $s_fecha_cita; ?>" placeholder="Su nombre" pattern="[A-Za-z]{3-15}" >
  <p>Motivo</p>
  <input type="text" value="<?php echo $s_motivo; ?>" name="apellidos">
 
  <input type="submit" value="Registrar datos" id="enviar" name="btn_actualizar_datos_usuario">
  </form>