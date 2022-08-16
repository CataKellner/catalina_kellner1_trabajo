<?php
include ("bd.php");

if(isset($_POST['add']))
{
    // echo "button create new workin";
 }

 session_start();

global $mysqli;
global $_SESSION;
//  $db_name = 'upgrade';

$s_titulo = $_POST['titulo'];
// $Email = $_POST['email'];
$s_texto = $_POST['texto'];
$s_idUser = $_SESSION['idUser'];
// echo $_SESSION['idUser'];
// $filePath="" . $_FILES["file"]["name"];
// $Type = $_POST['type'];

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



  $sql = "INSERT INTO noticias(idUser, titulo, imagen, fecha) VALUES ('".$s_idUser."','".$s_titulo."','".$s_texto."',curdate())";
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



?>