<?php
include ("bd.php");
// SCRIPT comprobar si existe usuario
$user = $_POST["usuario"];
// $pass=BCRYPT($_POST["password"]);

$sql="SELECT `idlogin`/*, `idUser`*/, `usuario`, `password`, `rol` FROM `users_login` WHERE 1";
$sql.=" AND `usuario` = '".$user."'";
// $sql.=" AND `password` ='".$pass."'";

/*SELECT `idlogin`, `user`, `password`, `role` FROM `logins`
    WHERE 1" AND `user` = '".$user. AND `password` ='".$pass.
 */

 // Almacena el resultado de la query, false si ha fallado, true si ha ido bien
$rs=$mysqli->query($sql);
    // comprueba si hay mas de una fila, es decir fila 0 y 1
    if($rs->num_rows>0){
        echo 0;
    }
    //
    else
    {
        echo 1;
    }
?>