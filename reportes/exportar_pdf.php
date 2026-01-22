<?php
include("../auth/proteger.php");
include("../config/conexion.php");
require("../lib/fpdf.php");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",12);
$pdf->Cell(0,10,"Reporte de Inventario",0,1);

$pdf->SetFont("Arial","",10);

$result = $conn->query("SELECT nombre, stock FROM productos");

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(0,8,$row['nombre']." - Stock: ".$row['stock'],0,1);
}

$pdf->Output();
