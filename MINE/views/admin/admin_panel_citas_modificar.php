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
<!-- // show data on inputs -->
<form action="admin_panel_citas_modificar.php" method="post" id="datos_usuario">
  <p>ID</p>
  <input type="text" value="<?php echo $s_idCitas ?>" name="idCitas">
  <p>Fecha</p>
  <input type="date" name="fecha" id="fechaCita"
  size="15" autocomplete="given-name" value="<?php echo $s_fecha_cita; ?>" placeholder="Su nombre" pattern="[A-Za-z]{3-15}" >
  <p>Motivo</p>
  <input type="text" value="<?php echo $s_motivo; ?>" name="motico">

  <input type="submit" value="Registrar datos" id="enviar" name="btn_actualizar_cita">
  </form>