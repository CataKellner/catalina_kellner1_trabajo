<h1>Hola
    <?php
        echo $_SESSION["usuario"];
        $ok = "";
    ?>
</h1>
<div id="sesion-barra">
    <a href="../views/login_BCRYPT.php">Noticias</a>
    <a href="../views/perfil.php">Prefil</a>
    <a href="../views/citaciones.php">Citaciones</a>
</div>
        <?php echo $ok ?>
            <form action="" method="post" enctype="multipart/ form-data">
                <input name="archivo" type="file" size="35" />
                <input name="enviar" type="submit" value="Subir fichero" />
                <input name="acc" type="hidden" value="subir" />
            </form>
                <?php
                    $ok = "";
                    // if ($_POST["acc"] == "subir") {
                    //     // si venimos del formulario sacamos los datos // del archivo
                    //     $tamano = $_FILES["archivo"]["size"];
                    //     $tipo = $_FILES["archivo"]["type"];
                    //     $archivo = $_FILES["archivo"]["name"];
                    //     if ($archivo != "") {
                    //     //guardamos el archivo en el raíz siempre que //no venga vacío
                    //     //lo llamamos "nuevo_" y el nombre que tuviera //en el ordenador
                    //     $destino = "/nuevo_".$archivo;
                    //     if (copy($_FILES["archivo"]["tmp_name"],$destino)) {
                    //         $ok = "Archivo subido: si";
                    //         } else {
                    //             $ok = "Archivo subido: no";
                    //         }
                    //     } else {
                    //         $ok = "no se selecciono archivo";
                    //     }
                    // }
                ?>
                    <a href="../PHP/salir.php">CERRAR SESSION</a>
