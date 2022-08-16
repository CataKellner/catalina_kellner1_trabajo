<?php
include ("bd.php");
session_start();

if(isset($_POST["crear_nuevo_usuario"])){
  crear_nuevo_usuario();
}

if(isset($_POST["btn_crear_nueva_cita"])){
  crear_cita();
}

if(isset($_POST["btn_actualizar_datos_usuario"])){
  actualizar_datos_usuario($_POST['idUser']);
}

if(isset($_POST["btn_actualizar_cita"])){
  actualizar_cita();
}

function actualizar_cita(){

  global $mysqli;

  $fecha_cita = $_POST['fecha_cita'];
  $motivo = $_POST['motivo'];
    //update user UPDATE SET where userid = $userid

    $sqlCitas="UPDATE citas SET fecha_cita = '$fecha_cita', motivo = '$motivo' WHERE idUser=$idUser";

    if ($mysqli->query($sqlCitas) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $mysqli->error;
    }

}

function crear_cita(){

  global $mysqli;

  $fecha_cita = $motivo = $idUser = "";

  // $rol = $_POST['rol'];

  // $usuario = $_POST['usuario'];
  // $email = $_POST['email'];
  // $pass = password_hash($_POST["password"], PASSWORD_BCRYPT);
  // $pass=BCRYPT($_POST["password"]);

  if(isset($_POST['fecha_cita']))
  {$fecha_cita = $_POST['fecha_cita'];};

  if(isset($_POST['motivo']))
  {$motivo = $_POST['motivo'];};

  if(isset($_POST['idUser']))
  {$idUser = $_POST['idUser'];};

      // el usuario no existe
      // lo crea

      // Rellenamos User data con los datos del formulario
      $sql6= "INSERT INTO citas (idUser, fecha_cita, motivo) VALUES ('".$idUser."','".$fecha_cita."','".$motivo."')";
      if ($mysqli->query($sql6) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $mysqli->error;
      }

      $mysqli->close();

}

function actualizar_datos_usuario($idUser){

  global $mysqli;

  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
  $fecha_nacimiento = $_POST['fecha_nacimiento'];
  $direccion = $_POST['direccion'];
  $genero = $_POST['genero'];
    //update user UPDATE SET where userid = $userid

    $sqlData="UPDATE users_data SET nombre = '$nombre', apellidos = '$apellidos', email = '$email', telefono = '$telefono', fecha_nacimiento = '$fecha_nacimiento', direccion = '$direccion', genero = '$genero' WHERE idUser=$idUser";

    if ($mysqli->query($sqlData) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $mysqli->error;
    }
  }


function crear_nuevo_usuario(){

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