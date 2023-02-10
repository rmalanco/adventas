<?php
// inicio de sesion
session_start();

// traemos el archivo de parametros de conexion a la base de datos que son constantes
require_once "config/Global.php";
require_once "config/Conexion.php";
require_once 'helpers/functions.php';

// Si no hay una sesión iniciada, redirigir al login
comprobarSession();

// Si hay una sesión iniciada, redirigir al index
require_once 'vistas/graficasbarras.php';
