<?php
    include ("bd.php");
// SCRIPT crear nuevo usuario si no existe
    //$pass = $_POST["password"];
    $pass = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $genero = $_POST['genero'];

    $usuario = $_POST['usuario'];

    // $usuario = $_POST["usuario"];
// $pass=BCRYPT($_POST["password"]);

    $sql="SELECT `idlogin`/*, `idUser`*/, `usuario`, `password`, `rol` FROM `users_login` WHERE 1";
    $sql.=" AND `usuario` = '".$usuario."'";
// $sql.=" AND `password` ='".$pass."'";


    // Almacena el resultado de la query, false si ha fallado, true si ha ido bien
    //Almacena el objeto resultante de la query (contiene informacion de la query)
    $rs=$mysqli->query($sql);
    // Obtiene el numero de filas y si es mayor que 0 no crea el usuario
    // si es 0 o menor, no existe fila con ese usuario, crea el usuario
    if($rs->num_rows>0){
        // el usuario existe
        // no lo hara


    }
    //
    else
    {
        // el usuario no existe
        // Lo hara

        echo "alert('no existe')";

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

        $sql= "INSERT INTO users_login(idUser, usuario, password, rol) VALUES ('".$x."','".$usuario."', '".$pass."','usuario')";
        $rs = $mysqli->query($sql);

            if($rs){
                header('Location:login_BCRYPT.php');
                // echo $sql;
                // echo "NO la has liado";
            }else{
                echo $sql;
                echo "la has liado";
                echo "Errormessage: %s\n", mysqli_error($mysqli);
            }

        $mysqli->close();
    }



?>