<?php
include ("../../PHP/bd.php");

if(isset($_POST['add']))
{
    echo "button create new workin";
    echo $_FILES['file']['name'];


 session_start();

global $mysqli;
global $_SESSION;
//  $db_name = 'upgrade';
$s_idNoticias = $_POST['idNoticias'];
$s_titulo = $_POST['titulo'];
$s_texto = $_POST['texto'];
// $s_imagen = $_SESSION['imagen'];
$s_fecha = $_SESSION['fecha'];
$s_idUser = $_SESSION['idUser'];
// echo $_SESSION['idUser'];
// $Type = $_POST['type'];

$archivo = $_FILES['file']['name'];
$tipo = $_FILES['file']['type'];
$tamano = $_FILES['file']['size'];
$temp = $_FILES['file']['tmp_name'];
// $filePath="" . $_FILES["file"]["name"];

// $uploadDir = 'http://www.yourwebsite.com/directory/'.'upload/';
$uploadDir = '../../images/';
$fileName = $_FILES['file']['name'];
$filePath = $uploadDir . $fileName;

// if ($_FILES["file"]["error"] > 0)
//   {
//     echo "Error: NO CHOSEN FILE <br />";
//     echo"INSERT TO DATABASE FAILED";
//   }
// else
//   {
//     move_uploaded_file($_FILES["file"]["tmp_name"], __DIR__ . "upload" . $_FILES["file"]["name"]);
//     echo"SAVED<br>";
//   }


      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
      if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
     }
     else {
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
        if (move_uploaded_file($temp, '../../images/'.$archivo)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('../../images/'.$archivo, 0777);
            //Mostramos el mensaje de que se ha subido co éxito
            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            //Mostramos la imagen subida
            echo '<p><img src="../../images/'.$archivo.'"></p>';
        }
        else {
           //Si no se ha podido subir la imagen, mostramos un mensaje de error
           echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
        }
      }


  $sql = "INSERT INTO noticias(idNoticias, titulo, imagen, fecha, texto, idUser) VALUES ('".$s_idNoticias."','".$s_titulo."', '".$filePath."' ,curdate(),'".$s_texto."', '".$s_idUser."')";
  if (mysqli_query($mysqli, $sql)) {
    echo "Record updated successfully<br>";
    // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
  } else {
    echo "Error updating record: " . mysqli_error($mysqli);
  }
  // if(mysql_query($query_image))
  // {
  //   echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
  // }
  // else
  // {
  //   echo 'File name not stored in database';
  // }
}



?>