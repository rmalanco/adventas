<?php
define("DB_HOST", "localhost");
define("DB_NAME", "ADVentas");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_ENCODE", "utf8");

//PARAMETROS DE LA PAGINA
define("TITLE", "IT PROYECTO");
define("BASE_URL", getBaseUrl());

function getBaseUrl()
{
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';
    $host     = $_SERVER['HTTP_HOST'];
    $script   = $_SERVER['SCRIPT_NAME'];
    $dir      = $_SERVER['SERVER_PORT'] == 80 ? rtrim(dirname($script), '/\\') : '';
    return $protocol . $host . $dir . '/';
}

// MENSAJES DE ERRORES Y EXITOS
define("ERROR_LOGIN", "Usuario o Contraseña Incorrectos");
