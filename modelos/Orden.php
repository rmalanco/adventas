<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class Orden
{
	//Implementamos nuestro constructor
	public function __construct()
	{
	}
	//Implementamos un método para insertar registros
	public function insertar($orden, $tipo_orden, $tipo_problema, $fecha, $turno_envio)
	{
		$sql = "INSERT INTO orden (orden,tipo_orden,tipo_problema,fecha,turno_envio)
		VALUES ('$orden','$tipo_orden','$tipo_problema','$fecha','$turno_envio')";
		return ejecutarConsulta($sql);
	}
	//Implementamos un método para editar registros
	public function editar($idorden, $orden, $tipo_orden, $tipo_problema, $fecha, $turno_envio)
	{
		$sql = "UPDATE orden SET orden='$orden',tipo_orden='$tipo_orden',tipo_problema='$tipo_problema',fecha='$fecha',turno_envio='$turno_envio' WHERE idorden='$idorden'";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idorden)
	{
		$sql = "SELECT * FROM orden WHERE idorden='$idorden'";
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para listar los registros
	public function listar()
	{
		$sql = "SELECT * FROM orden";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para eliminar el registro por el ID del Usuario
	public function eliminar($idorden)
	{
		$sql = "DELETE FROM orden WHERE idorden='$idorden'";
		return ejecutarConsulta($sql);
	}
}
