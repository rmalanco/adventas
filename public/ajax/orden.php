<?php
ob_start();

require_once "../modelos/Orden.php";

$ordenn = new Orden();

$idorden = isset($_POST["idorden"]) ? limpiarCadena($_POST["idorden"]) : "";


$orden = isset($_POST["orden"]) ? limpiarCadena($_POST["orden"]) : "";
$tipo_orden = isset($_POST["tipo_orden"]) ? limpiarCadena($_POST["tipo_orden"]) : "";
$tipo_problema = isset($_POST["tipo_problema"]) ? limpiarCadena($_POST["tipo_problema"]) : "";
$fecha = isset($_POST["fecha"]) ? limpiarCadena($_POST["fecha"]) : "";
$turno_envio = isset($_POST["turno_envio"]) ? limpiarCadena($_POST["turno_envio"]) : "";

switch ($_GET["op"]) {
	case 'guardaryeditar':
		
		if (empty($idorden)) {
			$rspta = $ordenn->insertar($orden, $tipo_orden, $tipo_problema, $fecha, $turno_envio);
			echo $rspta ? "La orden se ha registrado" : "La orden no se ha registrado";
		} else {
			$rspta = $ordenn->editar($idorden, $orden, $tipo_orden, $tipo_problema, $fecha, $turno_envio);
			echo $rspta ? "La orden se ha actualizado" : "La orden no se ha actualizado";
		}
		break;


	case 'eliminar':
		$rspta = $ordenn->eliminar($idorden);
		echo $rspta ? "El ordenes se ha eliminado!" : "ordenes no se puede eliminar";
		break;



	case 'mostrar':
		$rspta = $ordenn->mostrar($idorden);
		echo json_encode($rspta);
		break;

		
	case 'listar':
		//Validamos el acceso solo al ordenes logueado y autorizado.
		$rspta = $ordenn->listar();
		//Vamos a declarar un array
		$data = array();
		// AQUI ESTA EL PROBLEMA
		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0" => $reg->orden,
				"1" => $reg->tipo_orden,
				"2" => $reg->tipo_problema,
				"3" => $reg->turno_envio,
				"4" => $reg->fecha,
				"5" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->idorden . ')"><i class="fa fa-pencil"></i></button>' .
					' <button class="btn btn-danger" onclick="eliminar(' . $reg->idorden . ')"><i class="fa fa-trash"></i></button>',

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
