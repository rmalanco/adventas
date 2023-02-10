var tabla;

//Función que se ejecuta al inicio
function init() {
	mostrarform(false);
	listar();

	$("#formulario").on("submit", function (e) {
		guardaryeditar(e);
	})

	$('#mAcceso').addClass("treeview active");

}
//Función para guardar o editar

function guardaryeditar(e) {
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled", true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/orden.php?op=guardaryeditar",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function (datos) 
		{
			bootbox.alert(datos);
			mostrarform(false);
			tabla.ajax.reload();
		}
	});
	limpiar();
}

function mostrar(idorden) {
	$.post("../ajax/orden.php?op=mostrar", { idorden: idorden }, function (data, status) {
		
		data = JSON.parse(data);
		mostrarform(true);
		$("#orden").val(data.orden);
		$("#tipo_orden").val(data.tipo_orden);
		$("#tipo_problema").val(data.tipo_problema);
		$("#fecha").val(data.fecha);
		$("#turno_envio").val(data.turno_envio);
		
		$("#idorden").val(data.idorden);

	});
	$.post("../ajax/orden.php?op=permisos&id=" + idorden, function (r) {
		$("#permisos").html(r);
	});
}
//Función limpiar
function limpiar() {
	$("#orden").val("");
	$("#tipo_orden").val("");
	$("#tipo_problema").val("");
	$("#fecha").val("");
	$("#turno_envio").val("");
	$("#idorden").val("");
}

//Función mostrar formulario
 function mostrarform(flag) {
 	limpiar();
 	if (flag) {
 		$("#btnreporte").hide();
 		$("#listadoregistros").hide();
 		$("#formularioregistros").show();
 		$("#btnGuardar").prop("disabled", false);
 		$("#btnagregar").hide();
 	}
 	else {
 		$("#listadoregistros").show();
 		$("#formularioregistros").hide();
 		$("#btnagregar").show();
 	}
 }

//Función cancelarform
function cancelarform() {
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar() {
	// cambiar nombre de la tabla para mostrar
	tabla = $('#tbllistado').dataTable(
		{
			"lengthMenu": [5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
			"aProcessing": true,//Activamos el procesamiento del datatables
			"aServerSide": true,//Paginación y filtrado realizados por el servidor
			dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdf'
			],
			"ajax":
			{
				url: '../ajax/orden.php?op=listar',
				type: "get",
				dataType: "json",
				error: function (e) {
					console.log(e.responseText);
				}
			},
			"language": {
				"lengthMenu": "Mostrar : _MENU_ registros",
				"buttons": {
					"copyTitle": "Tabla Copiada",
					"copySuccess": {
						_: '%d líneas copiadas',
						1: '1 línea copiada'
					}
				}
			},
			"bDestroy": true,
			"iDisplayLength": 5,//Paginación
			"order": [[0, "desc"]]//Ordenar (columna,orden)
		}).DataTable();
}

//Función para eliminar registros
function eliminar(idorden)
{
	bootbox.confirm("¿Está Seguro de eliminar la orden?", function(result){
		if(result)
        {
        	$.post("../ajax/orden.php?op=eliminar", {idorden : idorden}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

init();