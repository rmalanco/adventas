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
</head>
<body>

<div class="container-fluid content-wrapper">
    <h1>GENERAR PDF FILE FROM MYSQL USING PHP</h1>
    <form class="form-inline" method="POST" action="../reportes/generar_PDF.php">
        <button type="submit" name="../reportes/generar_PDF" class="btn btn-primary"><i class="fa fa-pdf" aria-hidden="true"></i>Generar PDF</button>
    </form>
</div>


</body>
<?php
    require 'footer.php'
?>
<?php
 ob_end_flush();
