<?php require_once 'includes/head.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>

<script src="public/graficas/code/highcharts.js"></script>
<script src="public/graficas/code/modules/exporting.js"></script>
<script src="public/graficas/code/modules/export-data.js"></script>
<script src="public/graficas/code/modules/accessibility.js"></script>
<script src="public/graficas/code/modules/data.js"></script>
<script src="public/graficas/code/modules/drilldown.js"></script>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Graficas
            <small>Reportes</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Graficas</li>
        </ol>
        <div id="grafica" style="height: 400px; ">
            <figure class="highcharts-figure">
                <div id="container">
            </figure>
            <script type="text/javascript">
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        align: 'left',
                        text: 'Reporte Grafico que ordenes con quejas'
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
                            text: 'Total percent market share'
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
                                format: '{point.y:.0f}',
                                distance: 30
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> en total<br/>'
                    },

                    series: [{
                        name: "Datos",
                        colorByPoint: true,
                        data: [{
                                name: "Turno A",
                                y: <?php
                                    $query = "SELECT COUNT(*) a FROM orden WHERE turno_envio='A';";
                                    $result = mysqli_query($conexion, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['a'] ?>,
                                drilldown: "Turno A"
                            },
                            {
                                name: "Turno B",
                                y: <?php
                                    $query = "SELECT COUNT(*) b FROM orden WHERE turno_envio='B';";
                                    $result = mysqli_query($conexion, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['b'] ?>,
                                drilldown: "Turno B"
                            },
                            {
                                name: "Turno C",
                                y: <?php
                                    $query = "SELECT COUNT(*) c FROM orden WHERE turno_envio='C';";
                                    $result = mysqli_query($conexion, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['c'] ?>,
                                drilldown: "Turno C"
                            },
                            {
                                name: "Turno D",
                                y: <?php
                                    $query = "SELECT COUNT(*) d FROM orden WHERE turno_envio='D';";
                                    $result = mysqli_query($conexion, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['d'] ?>,
                                drilldown: "Turno D"
                            }
                        ]
                    }],
                    drilldown: {
                        breadcrumbs: {
                            position: {
                                align: 'right'
                            }
                        },
                        series: [{
                                name: "",
                                id: "Turno A",
                                data: [
                                    [
                                        "Incompleta",
                                        <?php
                                        $query = "SELECT COUNT(*) a FROM orden WHERE turno_envio='A' AND tipo_problema='Dañada';";
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
                                        $query = "SELECT COUNT(*) c FROM orden WHERE turno_envio='A' AND tipo_problema='Incompleta';";
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
                                    ]
                                ]
                            },
                            {
                                name: "",
                                id: "Turno B",
                                data: [
                                    [
                                        "Incompleta",
                                        <?php
                                        $query = "SELECT COUNT(*) a FROM orden WHERE turno_envio='B' AND tipo_problema='Dañada';";
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
                                        echo $row['b'];

                                        ?>
                                    ],
                                    [
                                        "Dañada o en mal estado",
                                        <?php
                                        $query = "SELECT COUNT(*) c FROM orden WHERE turno_envio='B' AND tipo_problema='Incompleta';";
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
                                    ]
                                ]
                            },
                            {
                                name: "",
                                id: "Turno C",
                                data: [
                                    [
                                        "Incompleta",
                                        <?php
                                        $query = "SELECT COUNT(*) a FROM orden WHERE turno_envio='C' AND tipo_problema='Dañada';";
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
                                        $query = "SELECT COUNT(*) c FROM orden WHERE turno_envio='C' AND tipo_problema='Incompleta';";
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
                                    ]
                                ]
                            },
                            {
                                name: "",
                                id: "Turno D",
                                data: [
                                    [
                                        "Incompleta",
                                        <?php
                                        $query = "SELECT COUNT(*) a FROM orden WHERE turno_envio='D' AND tipo_problema='Dañada';";
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
                                        $query = "SELECT COUNT(*) c FROM orden WHERE turno_envio='D' AND tipo_problema='Incompleta';";
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
                                    ]
                                ]
                            }
                        ]
                    }
                });
            </script>
        </div>
        <?php require_once 'includes/footer.php'; ?>