<?php
require_once "global.php";

function conexion()
{
	try {
		$conexion = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET " . DB_ENCODE);
		return $conexion;
	} catch (PDOException $e) {
		return false;
	}
}

function cerrarConexion($conexion)
{
	return $conexion = null;
}
