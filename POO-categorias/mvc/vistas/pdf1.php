
<?php
require_once('../controlador/controladorReto.php');
$controladorReto=new controladorReto();
$datos=$controladorReto->consultaReto();

require_once('../fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$pdf->Cell(40,10,'Nombre Reto', 1, 0, 'C');
$pdf->Cell(40,10,'Seccion', 1,1 , 'C');
$pdf->SetTextColor(150);
$pdf->SetDrawColor(128,0,0);

while($linea = $datos ->fetch_assoc()){
  
    $nombre=$linea['Nombre'];
    $desc=$linea['seccion'];
    $pdf->Cell(40,10,$nombre, 1, 0, 'C');
    $pdf->Cell(40,10,$desc, 1, 1, 'C');
}
$pdf->Output("retos.pdf", "D");//nos descarga el archivo
?>