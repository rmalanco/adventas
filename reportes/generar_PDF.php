<?php

require '../fpdf181/fpdf.php';
require '../fpdf181/font/courier.php';
require '../fpdf181/font/courierb.php';
require '../fpdf181/font/courierbi.php';
require '../fpdf181/font/helvetica.php';
require '../fpdf181/font/helveticab.php';
require '../fpdf181/font/helveticabi.php';
require '../fpdf181/font/times.php';
require '../fpdf181/font/timesb.php';
require '../fpdf181/font/timesbi.php';


class PDF extends fpdf
{
    function Header()
    {
        $this->setFont('times', '', 12);
    }
    function Footer()
    {
    }
}

// Datos de conexión
$mysqli = new mysqli("localhost", "root", "", "db");

if (mysqli_connect_errno()) {
    echo 'Conexion fallida: ', mysqli_connect_errno();
    exit();
}

// Consulta
$query = "SELECT * FROM orden";
$resultado = $mysqli->query($query);
$pdf = new fpdf();
$pdf->Cell('A4');
$pdf->AddPage();
// Logo
$pdf->Image('logo_ITT.png', 15, 8, 35);
// Arial bold 15
$pdf->SetFont('times', '', 15);
// Movernos a la derecha
$pdf->SetY(20, true);
$pdf->SetX(90, true);
$pdf->Cell(40, 10, 'REPORTE DE QUEJAS DE LOS CLIENTES', 0, 0, 'C');
// Salto de línea
$pdf->Ln(1);
$pdf->SetXY(150, 20);
$pdf->Cell(50, 30, "Fecha:" . date("d/m/Y"), 10);
// Salto de línea

$pdf->Ln(25);
//TITULOS DE LA TABLA
$pdf->setFillColor(232, 232, 232);
$pdf->Cell(40, 6, 'Orden', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'Tipo de orden', 1, 0, 'C', 1);
$pdf->Cell(50, 6, 'Tipo de problema', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'Turno', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'Fecha', 1, 0, 'C', 1);


//CONTENIDO DE LA TABLA
while ($fila = $resultado->fetch_assoc()) {
    $pdf->Ln(6);
    $pdf->Cell(40, 6, utf8_decode($fila['orden']), 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($fila['tipo_orden']), 1, 0, 'C');
    $pdf->Cell(50, 6, utf8_decode($fila['tipo_problema']), 1, 0, 'C');
    $pdf->Cell(20, 6, utf8_decode($fila['turno_envio']), 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($fila['fecha']), 1, 0, 'C');
}
	function ff()
    {
       $fecha=date('Y-m-d'); 
    }
$pdf->Output(ff($fecha.'REPORTE.PDF'));
