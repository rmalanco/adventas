<?php

// Funcion para limpiar los datos de entrada
function limpiarDatos($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

// comprobar la sesion
function comprobarSession()
{
    if (!isset($_SESSION['admin']) && !isset($_SESSION['usuario'])) {
        header('Location: ' . BASE_URL);
    }
}
