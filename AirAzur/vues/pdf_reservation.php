<?php
function creerPdfReservation($reservation) {
    require('fpdf/fpdf.php');
    
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->SetTextColor(74,74,74);
    $pdf->Image('images/airAzur.jpg',10,10, 64, 48);
    
    $pdf->Output('F','fpdf/réservation.pdf');
}