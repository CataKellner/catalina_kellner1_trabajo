<?php
$host = "localhost";
$usuario = "root";
$password = "";
$bd = "login";
$nombre = "";

$mysqli = new mysqli($host, $usuario, $password, $bd);

if($mysqli->connect_errno){
   echo "algo falla";
}

// try{
//     $conn = new PDO("mysql:host=$host; dbname=$bd;",$usuario, $password);
// } catch(PDOException $e){
//     die('Connected failed:'.$e->getMessage());
// }

?>