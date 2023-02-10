<?php

class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{
	}
	// //Implementamos un método para insertar registros
	// public function insertar($nombre, $email, $login, $clave, $permiso)
	// {
	// 	$sql = "INSERT INTO usuario (nombre,email,login,clave,permiso,condicion)
	// 	VALUES ('$nombre','$email','$login','$clave','$permiso','1')";
	// 	//return ejecutarConsulta($sql);
	// 	return ejecutarConsulta($sql);
	// }
	// //Implementamos un método para editar registros
	// public function editar($idusuario, $nombre, $email, $login, $clave, $permiso)
	// {
	// 	$sql = "UPDATE usuario SET nombre='$nombre',email='$email',login='$login',clave='$clave',permiso='$permiso',condicion='1' WHERE idusuario='$idusuario'";
	// 	return ejecutarConsulta($sql);
	// }
	// //Implementar un método para mostrar los datos de un registro a modificar
	// public function mostrar($idusuario)
	// {
	// 	$sql = "SELECT * FROM usuario WHERE idusuario='$idusuario'";
	// 	return ejecutarConsultaSimpleFila($sql);
	// }
	// //Implementar un método para listar los registros
	// public function listar()
	// {
	// 	$sql = "SELECT * FROM usuario";
	// 	return ejecutarConsulta($sql);
	// }

	// //Implementar un método para listar los permisos marcados
	// public function listarmarcados($idusuario)
	// {
	// 	$sql = "SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
	// 	return ejecutarConsulta($sql);
	// }

	//Función para verificar el acceso al sistema
	// public function verificar($login, $clave)
	// {
	// $sql = "SELECT idusuario,nombre,email,login,permiso FROM usuario WHERE login='$login' AND clave='$clave' AND condicion='1'";
	// return ejecutarConsulta($sql);
	// }

	// //Implementar un método para eliminar el registro por el ID del Usuario
	// public function eliminar($idusuario)
	// {
	// 	$sql = "DELETE FROM usuario WHERE idusuario='$idusuario'";
	// 	return ejecutarConsulta($sql);
	// }

	public static function existeUsuario($conexion, $usuario)
	{
		// comprobamos si el usuario existe en la base de datos
		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1;');
		$statement->execute(array(':usuario' => $usuario));
		return $statement->fetch();
	}
}
