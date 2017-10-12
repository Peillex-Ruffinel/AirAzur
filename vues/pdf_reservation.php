<?php
//fonction qui créer le pdf de la reservation
function creerPdfReservation($reservation) {
    require('fpdf/fpdf.php');
    
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->Image('images/airAzur.jpg',10,10, 64, 48);
    $pdf->Ln(50);
    $pdf->SetFont('Arial','B',16);
    $pdf->SetTextColor(74,74,74);
    $pdf->multiCell(0,10,"Reservation");
    $pdf->SetFont('Arial','',12);
    $txt = "Client : " . $reservation[0][3] . " " . $reservation[0][2];
    $pdf->multiCell(0,10,$txt);
    $txt = "Vol numero : " . $reservation[0][0];
    $pdf->multiCell(0,10,$txt);
    $txt = "Nombre de passagers : " . $reservation[0][4];
    $pdf->multiCell(0,10,$txt);
    $pdf->Output('F','fpdf/reservation.pdf');
    
    header("Content-Type: pdf");
    header("Content-Disposition: attachment; filename = reservation.pdf");
    header("Content-Transfer-Encoding: 'fpdf/pdf'\n");
    header("Pragma: no-cache");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
    header("Expires: 0");
    readfile("fpdf/reservation.pdf");
}