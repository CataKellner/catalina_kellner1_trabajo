<?php
// SCRIPT cerrar sesion
    session_start();
    session_destroy();
    $_SESSION = array();

    header("Location: /MINE/index.html");
?>