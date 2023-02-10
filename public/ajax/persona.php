<?php
require_once "../modelos/Orden.php";

$persona = new Persona();

$tipo_persona = isset($_POST["tipo_persona"]) ? limpiarCadena($_POST["tipo_persona"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$email = isset($_POST["email"]) ? limpiarCadena($_POST["email"]) : "";



switch ($_GET["op"]) {
	case 'guardaryeditar':

		if (empty($idpersona)) {
			$rspta = $persona->insertar($tipo_persona,$nombre,$email);
			echo $rspta ? "Persona registrado" : "No Persona se pudieron registrar todos los datos del Orden";
		} else {
			$rspta = $persona->editar($idpersona, $tipo_persona, $nombre, $email);
			echo $rspta ? "Persona actualizado" : "Persona no se pudo actualizar";
		}//Fin de las validaciones de acceso		
		break;


	case 'eliminar':
		$rspta = $persona->eliminar($idpersona);
		echo $rspta ? "Persona eliminada" : "La Persona no se puede eliminar";
		break;


	case 'mostrar':

		$rspta = $persona->mostrar($idpersona);
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
					"0" => $reg->tipo_persona,
					"1" => $reg->nombre,
					"2" => $reg->email,

					"3" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->idpersona . ')"><i class="fa fa-pencil"></i></button>' .
						' <button class="btn btn-danger" onclick="eliminar(' . $reg->idpersona . ')"><i class="fa fa-trash"></i></button>',
	
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





		ob_end_flush();
}
