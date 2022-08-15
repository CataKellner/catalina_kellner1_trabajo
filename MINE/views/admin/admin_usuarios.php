

<?php
include('../../PHP/bd.php');
include('../../PHP/metodos_admin.php');
$query = "SELECT idUser, nombre, apellidos, email, direccion, telefono, genero FROM users_data";
$result=$mysqli->query($query);
// $result = mysqli_query($mysqli, $query);
?>
<table border ="1" cellspacing="0" cellpadding="10">
  <tr>

    <th>S.N</th>
    <th>userID </th>
    <th>Nombre Completo</th>
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
   <td><form action="admin_usuarios.php" method="post" id="btn_standard"><input type="submit" value="<?php echo $data['idUser'] ?>" name="editar_usuario"></td>
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

