<?php
require_once('../controlador/ControladorCategoria.php');
$ControladorCategoria=new ControladorCategoria();
$datos=$ControladorCategoria->consultar();

require_once('../fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$pdf->Cell(40,10,'Nombre Categoria', 1, 1, 'C');
$pdf->SetTextColor(150);
$pdf->SetDrawColor(128,0,0);

while($linea = $datos ->fetch_assoc()){
    $nombre=$linea['nombre'];
    
    $pdf->Cell(40,10,$nombre, 1, 1, 'C');
}

$pdf->Output("../archivos/Categorias.pdf", "F");//nos descarga el archivo en la ruta indicada

?>