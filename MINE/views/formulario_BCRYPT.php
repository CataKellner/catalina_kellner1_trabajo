<?php
include('../PHP/metodos.php');
?>

<form action="formulario_BCRYPT.php" method="post" id="login-formulario">
        <!--datos cliente / users_login-->
        Usuario <span id="respuesta"></span><br>
        <input type="text" name="usuario" id="usuario" required><br>
        Contraseña <br>
            <input type="password" name="password" id="password" required><br></br>
            <!--boton de envio-->
            <input type="submit" value="Acceder" id="enviar" name="login_btn">
</form>