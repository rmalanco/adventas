<?php

ob_start();
require_once "../modelos/Usuario.php";

$usuario = new Usuario();

$idusuario = isset($_POST["idusuario"]) ? limpiarCadena($_POST["idusuario"]) : "";

$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$email = isset($_POST["email"]) ? limpiarCadena($_POST["email"]) : "";
$login = isset($_POST["login"]) ? limpiarCadena($_POST["login"]) : "";
$clave = isset($_POST["clave"]) ? limpiarCadena($_POST["clave"]) : "";
$permiso = isset($_POST["permiso"]) ? limpiarCadena($_POST["permiso"]) : "";




switch ($_GET["op"]) {
	case 'guardaryeditar':

		//Hash SHA256 en la contraseña
		$clavehash = hash("SHA256", $clave);
		if (empty($idusuario)) {
			$rspta = $usuario->insertar($nombre, $email, $login, $clavehash, $permiso);
			echo $rspta ? "Usuario registrado" : "No se pudieron registrar el usuario";
		} else {
			$rspta = $usuario->editar($idusuario, $nombre, $email, $login, $clavehash, $permiso);
			echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
		}
		break;


	case 'eliminar':
		$rspta = $usuario->eliminar($idusuario);
		echo $rspta ? "El usuario se ha eliminado!" : "Usuario no se puede eliminar";
		break;



	case 'mostrar':
		$rspta = $usuario->mostrar($idusuario);
		echo json_encode($rspta);
		break;

		
	case 'listar':
		//Validamos el acceso solo al usuario logueado y autorizado.
		$rspta = $usuario->listar();
		//Vamos a declarar un array
		$data = array();
		// AQUI ESTA EL PROBLEMA
		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0" => $reg->nombre,
				"1" => $reg->email,
				"2" => $reg->login,
				"3" => $reg->permiso,
				"4" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->idusuario . ')"><i class="fa fa-pencil"></i></button>' .
					' <button class="btn btn-danger" onclick="eliminar(' . $reg->idusuario . ')"><i class="fa fa-trash"></i></button>',

			);
		}
		$results = array(
			"sEcho" => 1, //Información para el datatables
			"iTotalRecords" => count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
			"aaData" => $data
		);
		echo json_encode($results);
		//Fin de las validaciones de acceso

		break;

	case 'permisos':
		//Obtenemos todos los permisos de la tabla permisos
		require_once "../modelos/Permiso.php";
		$permiso = new Permiso();
		$rspta = $permiso->listar();

		// 	//Obtener los permisos asignados al usuario
		$id = $_GET['id'];
		$marcados = $usuario->listarmarcados($id);
		//Declaramos el array para almacenar todos los permisos marcados
		$valores = array();

		//Mostramos la lista de permisos en la vista y si están o no marcados
		while ($reg = $rspta->fetch_object()) {
			$sw = in_array($reg->idpermiso, $valores) ? 'checked' : '';
			echo '<li> <input type="checkbox" ' . $sw . '  name="permiso[]" value="' . $reg->idpermiso . '">' . $reg->nombre . '</li>';
		}
		break;

	case 'verificar':
		$logina = $_POST['logina'];
		$clavea = $_POST['clavea'];

		//Hash SHA256 en la contraseña
		$clavehash = hash("SHA256", $clavea);
		$rspta = $usuario->verificar($logina, $clavehash);
		$fetch = $rspta->fetch_object();

		if (isset($fetch)) {
			//Declaramos las variables de sesión
			$_SESSION['idusuario'] = $fetch->idusuario;
			$_SESSION['nombre'] = $fetch->nombre;
			$_SESSION['login'] = $fetch->login;

			//Obtenemos los permisos del usuario
			$marcados = $usuario->listarmarcados($fetch->idusuario);

			//Declaramos el array para almacenar todos los permisos marcados
			$valores = array();

			//Almacenamos los permisos marcados en el array
			while ($per = $marcados->fetch_object()) {
				array_push($valores, $per->idpermiso);
			}

			//Determinamos los accesos del usuario

	
			in_array(1, $valores) ? $_SESSION['Admin'] = 1 : $_SESSION['Admin'] = 0;
			in_array(2, $valores) ? $_SESSION['CustomerService'] = 1 : $_SESSION['CustomerService'] = 0;
			in_array(3, $valores) ? $_SESSION['Usuario'] = 1 : $_SESSION['Usuario'] = 0;
		
		}
		echo json_encode($fetch);
		break;

		ob_end_flush();
}
