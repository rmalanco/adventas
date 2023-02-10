<?php
// inicio de sesion
session_start();

// traemos el archivo de parametros de conexion a la base de datos que son constantes
require_once "config/Global.php";
require_once "config/Conexion.php";
require_once 'helpers/functions.php';
require_once 'modelos/Usuario.php';

$conexion = conexion();
// si no hay conexion a la base de datos
if (!$conexion) {
    echo "Error al conectar a la base de datos";
    die();
}

// si el usuario envia el formulario de login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // limpiamos los datos del formulario
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);

    // Borrar error antiguo
    if (isset($_SESSION['error_login'])) {
        unset($_SESSION['error_login']);
    }

    // si los campos estan vacios
    if (empty($usuario) || empty($password)) {
        // mostramos un mensaje de error
        $_SESSION['error_login'] = ERROR_LOGIN;
    } else {
        $resultado = Usuario::existeUsuario($conexion, $usuario);
        // si el usuario existe
        if ($resultado !== false) {
            // verificamos el password
            $verify = password_verify($password, $resultado['password']);
            // condicional para verificar el password
            if ($verify) {
                // verificamos rol del usuario
                if ($resultado['idrol'] == 1) {
                    // creamos la sesion
                    $_SESSION['admin'] = $usuario;
                    $_SESSION['nombre'] = $resultado['nombre'];
                    // redireccionamos al index
                    header('Location: index.php');
                } else {
                    // creamos la sesion
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['nombre'] = $resultado['nombre'];
                    // redireccionamos al index
                    header('Location: index.php');
                }
            } else {
                $_SESSION['error_login'] = ERROR_LOGIN;
            }
        } else {
            // si el usuario no existe
            // mostramos un mensaje de error
            $_SESSION['error_login'] = ERROR_LOGIN;
        }
    }
}

require_once 'vistas/login.php';
