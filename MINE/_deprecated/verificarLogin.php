<?php
    include("bd.php");
// Script verificar login empezar sesion guardar datos
    $usuario = $_POST["usuario"];
    $pass = $_POST["password"];

    $sql="SELECT `idlogin`,/* `idUser`,*/ `usuario`, `password`, `rol` FROM `users_login` WHERE 1";
    $sql.=" AND `usuario` = '".$usuario."'";

    $rs=$mysqli->query($sql);

        if($rs->num_rows>0){
            while($fila=$rs->fetch_assoc()){
                if(password_verify($pass, $fila["password"])){
                    session_start();
                    $_SESSION["valido"]="SI";
                    $_SESSION["usuario"]=$fila["usuario"];
                    $_SESSION["password"]=$fila["password"];
                    $_SESSION["rol"]=$fila["rol"];

                    echo 1;
                }else{
                    echo 0;
                }
            }
        }
?>