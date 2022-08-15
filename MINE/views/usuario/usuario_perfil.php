<?php
include('metodos.php');
include('metodos_user.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>

Mostrar en fila los datos del usuario
<form action="usuario_perfil.php" method="post">
                <?php echo display_error(); ?>
                    <!--datos cliente / users_data-->
                        Nombre <br>
                            <input type="text" name="nombre" id="nombre"
                            size="15" autocomplete="given-name" placeholder="Su nombre" pattern="[A-Za-z]{3-15}" ><br>
                        Apellidos <br>
                            <input type="text" name="apellidos" id="apellidos"
                            size="40" autocomplete="family-name" placeholder="Sus apellidos"  pattern="[A-Za-z]{3-40}" ><br>
                        Email <br>
                            <input type="email" name="email" id="email"
                            multiple autocomplete="email" placeholder="Su email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br>
                        Telefono <br>
                            <input type="tel" name="telefono" id="telefono"
                            size="9" autocomplete="tel" placeholder="Su telefono" ><br>
                        Fecha de nacimiento <br>
                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" ><br>
                        Direccion <br>
                            <input type="text" name="direccion" id="direccion" ><br>
                        genero <br>
                            <!-- <input type="text" name="genero" id="genero" required><br> -->
                            <select name="genero" >
                            <!-- onchange="cambiar_genero(this)" -->
                                <option type="text" id="mujer" value="mujer"  selected>Mujer</option>
                                <option type="text" id="hombre" value="hombre" >Hombre</option>
                                <option type="text" id="lgtbiqa" value="lgtbiqa" >lgtbiqa+</option>
                                <option type="text" id="indefinido" value="indefinido" >indefinido</option>
                            </select>
                            <br>
                            <!--datos cliente / users_login-->
                                Usuario <span id="respuesta"></span><br>
                                <input type="text" name="usuario" id="usuario" required><br>
                                Contraseña <br>
                                    <input type="password" name="password" id="password" required><br></br>
                                    <!--boton de envio-->
                                        <!-- <input type="submit" value="Acceder" onclick="validar(this.form);"> -->
                                        <button type="submit" class="btn" name="cambiar_datos_usuario">Cambiar datos</button>
                </form>
mostrar un boton modificar
al hacer click en el boton lleva a otra pagina
pagina formularion de modificar dichos datos