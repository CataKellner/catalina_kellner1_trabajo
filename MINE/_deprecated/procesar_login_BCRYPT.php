<?php
// SCRIPT para verificar un login con la base de datos
include ("bd.php");


if (isset($_POST['login_btn'])) {

    $usuario = $_POST["usuario"];
    $pass = $_POST["password"];

    $sql="SELECT `idlogin`, `idUser`, `usuario`, `password`, `rol` FROM `users_login` WHERE 1";
    $sql.=" AND `usuario` = '".$usuario."'";

    $rs=$mysqli->query($sql);

    if($rs->num_rows>0){
        while($fila=$rs->fetch_assoc()){
            if(password_verify($_POST["password"], $fila["password"])){
                session_start();
                $_SESSION["valido"]="SI";
                $_SESSION["usuario"]=$fila["usuario"];
                $_SESSION["password"]=$fila["password"];
                $_SESSION["rol"]=$fila["rol"];
                $_SESSION["idUser"]=$fila["idUser"];

                //ehco $sql;
                header("Location: login_BCRYPT.php");
            }
        }
    }
    header("Location: login_BCRYPT.php");
    // echo "<h1>No existe usuario</h1>";
}
    ?>