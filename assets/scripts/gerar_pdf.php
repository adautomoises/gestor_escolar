<?php
require('C:\xampp\htdocs\gestor_escolar\fpdf\fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output();

foreach ($variable as $key => $value) {
  # code...
}