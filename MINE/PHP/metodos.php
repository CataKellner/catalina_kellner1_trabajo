<?php

// connect to database
include ("bd.php");
// $db = mysqli_connect('localhost', 'root', '', 'login');

// session_start();

// variable declaration
$user = "";
$email = "";
$errors = array();

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {

	register();
}

if (isset($_POST['login_btn'])) {

  login();
}


function login(){

  global $mysqli;

  $user = $_POST["usuario"];
  $pass = $_POST["password"];

  $sql="SELECT `idlogin`/*, `idUser`*/, `usuario`, `password`, `rol` FROM `users_login` WHERE 1";
  $sql.=" AND `usuario` = '".$user."'";

  $rs=$mysqli->query($sql);

  if($rs->num_rows>0){
      while($fila=$rs->fetch_assoc()){
          if(password_verify($_POST["password"], $fila["password"])){
              session_start();
              $_SESSION["valido"]="SI";
              $_SESSION["usuario"]=$fila["usuario"];
              $_SESSION["password"]=$fila["password"];
              $_SESSION["rol"]=$fila["rol"];
              

              if($_SESSION["rol"] == "admin"){
                header("Location: admin/admin_home.php");
              }
              else{

                header('Location: ../views/usuario/usuario_home.php');
              }

              //ehco $sql;
              // Recargar pagina
          }
      }
  }
  else{
    // ENG Return to blank form
    // ESP Recargar formulario
      header("Location: login_BCRYPT.php");
  }
  // echo "<h1>No existe usuario</h1>";
}

// REGISTER USER
function register(){

  global $mysqli;

  $nombre = $apellidos = $telefono = $fecha_nacimiento = $direccion = $genero = "cualquiera";
  $_SESSION["rol"] = "usuario";

  $usuario = $_SESSION["usuario"] = $_POST['usuario'];
  $email = $_SESSION["email"] = $_POST['email'];
  $pass = password_hash($_POST["password"], PASSWORD_BCRYPT);
  // $pass=BCRYPT($_POST["password"]);

  // Comprueba si lo recibido por POST esta configurado y no es nulo
  if(isset($_POST['nombre']))
  // Recibir variable nombre de metodo $POST y almacenar en SG $SESSION y en var $nombre
  {$nombre = $_SESSION["nombre"] = $_POST['nombre'];};

  if(isset($_POST['apellidos']))
  {$apellidos = $_SESSION["apellidos"] = $_POST['apellidos'];};

  if(isset($_POST['telefono']))
  {$telefono = $_SESSION["telefono"] = $_POST['telefono'];};

  if(isset($_POST['fecha_nacimiento']))
  {$fecha_nacimiento = $_SESSION["fecha_nacimiento"] = $_POST['fecha_nacimiento'];};

  if(isset($_POST['direccion']))
  {$direccion = $_SESSION["direccion"] = $_POST['direccion'];};

  if(isset($_POST['genero']))
  {$genero = $_SESSION["genero"] = $_POST['genero'];};


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
      $sql= "INSERT INTO users_login(idUser, usuario, password, rol) VALUES ('".$x."','".$usuario."', '".$pass."','usuario')";
      $rs = $mysqli->query($sql);

      $_SESSION["userID"] = $x;
      // $logged_in_user_id = mysqli_insert_id($mysqli);
      // $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session

          if($rs){
            // echo "NO la has liado";
            // Si es admin
            if($_SESSION["rol"] == "admin")
            {
              header('Location: ../views/admin/admin_home.php');
            }
            else
            {
              header('Location: ../views/usuario/usuario_home.php');
            }
          }else{
            // echo "la has liado";
              echo $sql;
              echo "Errormessage: %s\n", mysqli_error($mysqli);
          }

      $mysqli->close();
  }
}

// return user array from their id
function getUserById($id){
	global $mysqli;
	$query = "SELECT * FROM users_data WHERE id=" . $id;
	$result = mysqli_query($mysqli, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($mysqli, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isAdmin()
{
	if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['usuario'])) {
		return true;
	}else{
		return false;
	}
}

// Get button logout and close session

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: /MINE/index.html");
}

// function close_session(){

//     // session_start();
//     session_destroy();
//     $_SESSION = array();

//     header("Location: login_BCRYPT.php");
// }

$sqlCitas="SELECT `idCitas`, `idUser`, `fecha_cita`, `motivo` FROM `citas` WHERE 1";
// $sqlCita.=" AND `usuario` = '".$user."'";

$sqlCitas="UPDATE citas SET fecha_cita = '$fecha_cita', motivo = '$motivo'  WHERE condition";


$sqlCita= "INSERT INTO citas(fecha_cita, motivo) VALUES ('".$fecha_cita."','".$motivo."')";
$qlCita = $mysqli->query($sqlCita);


$sqlNoticias="SELECT `idNoticias`, `idUser`, `titulo`, `imagen`, `fecha` FROM `noticias` WHERE 1";
// $sqlNoticias.=" AND `usuario` = '".$user."'";

$sqlNoticias="UPDATE noticias SET titulo = '$titulo', imagen = '$imagen', 	fecha = '$fecha'  WHERE condition";

$sqlNoticias= "INSERT INTO noticias(titulo, imagen, fecha) VALUES ('".$titulo."','".$imagen."','".$fecha."')";
// $sqlNoticias = $mysqli->query($sqlCita);

?>