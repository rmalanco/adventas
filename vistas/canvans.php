<?php
ob_start();
session_start();

require 'header.php';
require_once '../config/Conexion.php';
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../public/css/graficas.css">
	<script src="../graficas/code/highcharts.js"></script>
</head>

<body>

	<div class="row">
		<div class="col-md-6 col-ms-12 col-lg-6">
			<div id="container1" style="max-width: 100%; margin:1%; margin-top:3%; margin-right:2%;">
			</div>
		</div>
		<div class="col-md-6 col-ms-12 col-lg-6">
			<div id="container2" style="max-width: 100%; margin:1%; margin-top:3%; margin-right:2%;">
			</div>
		</div>
		<div class="col-md-6 col-ms-12 col-lg-6">
			<div id="container3" style="max-width: 100%; margin:1%; margin-top:3%; margin-right:2%;">
			</div>
		</div>
		<div class="col-md-6 col-ms-12 col-lg-6">
			<div id="container4" style="max-width: 100%; margin:1%; margin-top:3%; margin-right:2%;">
			</div>
		</div>
		<script src="https://cdn.plot.ly/plotly-2.16.1.min.js"></script>
		<script type="text/javascript">
			// Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar

			// GRAFICAS DE LOS 4 TURNOS A B C D
			Highcharts.chart('container1', {
				colors: ['#483D8B'],
				chart: {
					type: 'column'
				},
				title: {
					align: 'center',
					text: '<h3>Reporte Grafico de ordenes con quejas Turno A</h3>'
				},
				subtitle: {
					align: 'left',
					text: ''
				},
				accessibility: {
					announceNewData: {
						enabled: true
					}
				},
				xAxis: {
					type: 'category'
				},
				yAxis: {
					title: {
						text: '<spam style="font-size:10px;"> Total</spam>'
					}

				},
				legend: {
					enabled: false
				},
				plotOptions: {
					series: {
						borderWidth: 1,
						dataLabels: {
							enabled: true,
							format: '{point.y:f}',
							distance: 100
						}
					}
				},

				tooltip: {
					headerFormat: '<span style="font-size:11px"></span><br>',
					pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> en total<br/>'
				},
				series: [{
					name: "",
					id: "Turno A",
					data: [
						["Incompleta",
							<?php
							$query = "SELECT COUNT(*) a FROM orden WHERE turno_envio='A' AND tipo_problema='Incompleta';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['a'] ?>
						],
						[
							"Faltante de accesorios",
							<?php
							$query = "SELECT COUNT(*) b FROM orden WHERE turno_envio='A' AND tipo_problema='Faltante';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['b'] ?>
						],
						[
							"Dañada o en mal estado",
							<?php
							$query = "SELECT COUNT(*) c FROM orden WHERE turno_envio='A' AND tipo_problema='Dañada';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['c'] ?>
						],
						[
							"Otro",
							<?php
							$query = "SELECT COUNT(*) d FROM orden WHERE turno_envio='A' AND tipo_problema='Otro';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['d'] ?>
						],
						resize = true
					]
				}]
			});
			Highcharts.chart('container2', {
				colors: ['#8B008B'],
				chart: {
					type: 'column'
				},
				title: {
					align: 'center',
					text: '<h3>Reporte Grafico de ordenes con quejas Turno B</h3>'
				},
				subtitle: {
					align: 'left',
					text: ''
				},
				accessibility: {
					announceNewData: {
						enabled: true
					}
				},
				xAxis: {
					type: 'category'
				},
				yAxis: {
					title: {
						text: '<spam style="font-size:10px;">Porcentajes totales</spam>'
					}
				},
				legend: {
					enabled: false
				},
				plotOptions: {
					series: {
						borderWidth: 1,
						dataLabels: {
							enabled: true,
							format: '{point.y:f}',
							distance: 100
						}
					}
				},
				tooltip: {
					headerFormat: '<span style="font-size:11px"></span><br>',
					pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> en total<br/>'
				},
				series: [{
					name: "",
					id: "Turno A",
					data: [
						[
							"Incompleta",
							<?php

							$query = "SELECT COUNT(*) a FROM orden WHERE turno_envio='B' AND tipo_problema='Incompleta';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['a'] ?>
						],
						[
							"Faltante de accesorios",
							<?php
							$query = "SELECT COUNT(*) b FROM orden WHERE turno_envio='B' AND tipo_problema='Faltante';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['b'] ?>
						],
						[
							"Dañada o en mal estado",
							<?php
							$query = "SELECT COUNT(*) c FROM orden WHERE turno_envio='B' AND tipo_problema='Dañada';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['c'] ?>
						],
						[
							"Otro",
							<?php
							$query = "SELECT COUNT(*) d FROM orden WHERE turno_envio='B' AND tipo_problema='Otro';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['d'] ?>
						],
						resize = true,

					]
				}]
			});
			Highcharts.chart('container3', {
				colors: ['#FF8C00'],
				chart: {
					type: 'column'
				},
				title: {
					align: 'center',
					text: '<h3>Reporte Grafico de ordenes con quejas Turno C</h3>'
				},
				subtitle: {
					align: 'left',
					text: ''
				},
				accessibility: {
					announceNewData: {
						enabled: true
					}
				},
				xAxis: {
					type: 'category'
				},
				yAxis: {
					title: {
						text: '<spam style="font-size:10px;">Porcentajes totales</spam>'
					}

				},
				legend: {
					enabled: false
				},
				plotOptions: {
					series: {
						borderWidth: 1,
						dataLabels: {
							enabled: true,
							format: '{point.y:f}',
							distance: 100
						}
					}
				},

				tooltip: {
					headerFormat: '<span style="font-size:11px"></span><br>',
					pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> en total<br/>'
				},
				series: [{
					name: "",
					id: "Turno A",
					data: [
						[
							"Incompleta",
							<?php
							$query = "SELECT COUNT(*) a FROM orden WHERE turno_envio='C' AND tipo_problema='Incompleta';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['a'] ?>
						],
						[
							"Faltante de accesorios",
							<?php
							$query = "SELECT COUNT(*) b FROM orden WHERE turno_envio='C' AND tipo_problema='Faltante';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['b'] ?>
						],
						[
							"Dañada o en mal estado",
							<?php
							$query = "SELECT COUNT(*) c FROM orden WHERE turno_envio='C' AND tipo_problema='Dañada';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['c'] ?>
						],
						[
							"Otro",
							<?php
							$query = "SELECT COUNT(*) d FROM orden WHERE turno_envio='C' AND tipo_problema='Otro';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['d'] ?>
						],
						resize = true
					]
				}]
			});
			Highcharts.chart('container4', {
				colors: ['#8B0000'],
				chart: {
					type: 'column'
				},
				title: {
					align: 'center',
					text: '<h3>Reporte Grafico de ordenes con quejas Turno D </h3>'
				},
				subtitle: {
					align: 'left',
					text: ''
				},
				accessibility: {
					announceNewData: {
						enabled: true
					}
				},
				xAxis: {
					type: 'category'
				},
				yAxis: {
					title: {
						text: '<spam style="font-size:10px;">Porcentajes totales</spam>'
					}

				},
				legend: {
					enabled: false
				},
				plotOptions: {
					series: {
						borderWidth: 1,
						dataLabels: {
							enabled: true,
							format: '{point.y:f}',
							distance: 100
						}
					}
				},

				tooltip: {
					headerFormat: '<span style="font-size:11px"></span><br>',
					pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> en total<br/>'
				},
				series: [{
					name: "",
					id: "Turno A",
					data: [
						[
							"Incompleta",
							<?php
							$query = "SELECT COUNT(*) a FROM orden WHERE turno_envio='D' AND tipo_problema='Incompleta';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['a'] ?>
						],
						[
							"Faltante de accesorios",
							<?php
							$query = "SELECT COUNT(*) b FROM orden WHERE turno_envio='D' AND tipo_problema='Faltante';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['b'] ?>
						],
						[
							"Dañada o en mal estado",
							<?php
							$query = "SELECT COUNT(*) c FROM orden WHERE turno_envio='D' AND tipo_problema='Dañada';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['c'] ?>
						],
						[
							"Otro",
							<?php
							$query = "SELECT COUNT(*) d FROM orden WHERE turno_envio='D' AND tipo_problema='Otro';";
							$result = mysqli_query($conexion, $query);
							$row = mysqli_fetch_assoc($result);
							echo $row['d'] ?>
						],
						resize = true
					]
				}]
			});
		</script>
</body>
<?php
require 'footer.php'
?>
<?php

ob_end_flush();
