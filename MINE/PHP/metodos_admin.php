<?php
include ("bd.php");
session_start();

if(isset($_POST["crear_nuevo_usuario"])){
  create_new_user();
}
if(isset($_POST["show_data"])){
  showdata();
}

if(isset($_POST["btn_actualizar_datos_usuario"])){
  actualizar_datos_usuario();
}

function actualizar_datos_usuario($idUser){

    //update user UPDATE SET where userid = $userid
}

function showdata(){

  // header("Location: /MINE/index.html");
  global $mysqli;

  $sql="SELECT `idlogin`, `idUser`, `usuario`, `password`, `rol` FROM `users_login`";

  $rs = $mysqli->query($sql);

  $int_Col = 1;
  echo("<table>");
  while($row = mysqli_fetch_array($rs))
  {
      if ($int_Col == 1) {
         echo("<tr>");
      }

      echo("<td>");
      echo("<a href='" . $row['usuario'] . "'>" . $row['idlogin'] . "</a><br>");
      // echo("<img src=\"" . $row['image'] . "\"><br>");
      echo($row['rol'] . "<br><br>");
      echo("</td>");

      if ($int_Col == 3) {
          echo("</tr>");
          $int_Col = 1;
      } else {
        $int_Col++;
      }
  }

  if ($int_Col > 1) {
     echo("<td colspan='". (3 - $int_Col) ."'>&nbsp;</td></tr>");
  }
  echo("</table>");

}

function create_new_user(){

  global $mysqli;

  $nombre = $apellidos = $telefono = $fecha_nacimiento = $direccion = $genero = $rol = "";

  $rol = $_POST['rol'];

  $usuario = $_POST['usuario'];
  $email = $_POST['email'];
  $pass = password_hash($_POST["password"], PASSWORD_BCRYPT);
  // $pass=BCRYPT($_POST["password"]);

  if(isset($_POST['nombre']))
  {$nombre = $_POST['nombre'];};

  if(isset($_POST['apellidos']))
  {$apellidos = $_POST['apellidos'];};

  if(isset($_POST['telefono']))
  {$telefono = $_POST['telefono'];};

  if(isset($_POST['fecha_nacimiento']))
  {$fecha_nacimiento = $_POST['fecha_nacimiento'];};

  if(isset($_POST['direccion']))
  {$direccion = $_POST['direccion'];};

  if(isset($_POST['genero']))
  {$genero = $_POST['genero'];};


  $sql="SELECT `idlogin`/*, `idUser`*/, `usuario`, `password`, `rol` FROM `users_login` WHERE 1";
  $sql.=" AND `usuario` = '".$usuario."'";

  // Almacena el resultado de la query, false si ha fallado, true si ha ido bien
  // Almacena el objeto resultante de la query (contiene informacion de la query)
  $rs=$mysqli->query($sql);

  // Obtiene el numero de filas y si es mayor que 0 no crea el usuario
  // si es 0, no existe fila con ese usuario, crea el usuario
  if  ($rs->num_rows>0){
      // el usuario existe
      // no lo crea
  } else {
      // el usuario no existe
      // lo crea

      // Rellenamos User data con los datos del formulario
      $sql1= "INSERT INTO users_data(nombre, apellidos, email, telefono, fecha_nacimiento, direccion, genero) VALUES ('".$nombre."','".$apellidos."', '".$email."','".$telefono."','".$fecha_nacimiento."','".$direccion."','".$genero."')";
      $ql = $mysqli->query($sql1);

      $consulta = "SELECT * FROM users_data WHERE email = '".$email."'";

      $ql = $mysqli->query($consulta);

      $fila = $ql->fetch_array();

      $x = null;

          while($fila)
          {
              $x = $fila[0];

              $fila = $ql->fetch_array();
          }

      // Rellenamos User login con los datos de la sesion
      $sql= "INSERT INTO users_login(idUser, usuario, password, rol) VALUES ('".$x."','".$usuario."', '".$pass."','".$rol."')";
      $rs = $mysqli->query($sql);


          if($rs){
            // echo "NO la has liado";

          }else{
            // echo "la has liado";
              echo $sql;
              echo "Errormessage: %s\n", mysqli_error($mysqli);
          }

      $mysqli->close();
  }
}

?>