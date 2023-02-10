<?php

//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class Persona
{
	//Implementamos nuestro constructor
	public function __construct()
	{
	}

	//Implementamos un método para insertar quejas
	public function insertar($tipo_persona, $nombre, $email)
	{
		$sql = "INSERT INTO persona (tipo_persona,nombre,email)
		VALUES ('$tipo_persona','$nombre','$email')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar quejas
	public function editar($idpersona, $tipo_persona, $nombre, $email)
	{
		$sql = "UPDATE persona SET tipo_persona='$tipo_persona',nombre='$nombre',email='$email' WHERE idpersona='$idpersona'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idpersona)
	{
		$sql = "SELECT * FROM persona WHERE idpersona='$idpersona'";
		return ejecutarConsultaSimpleFila($sql);
	}



	//Implementar un método para listar los quejas
	public function listar()
	{
		$sql = "SELECT * FROM persona";
		return ejecutarConsulta($sql);
	}




	//Implementar un método para eliminar el registro por el ID del Usuario
	public function eliminar($idpersona)
	{
		$sql = "DELETE FROM persona WHERE idpersona='$idpersona'";
		return ejecutarConsulta($sql);
	}
}
