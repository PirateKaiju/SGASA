<?php

    // FONT FOLDER REQUIRE PERMISSIONS


    function testPDF(){

        $pdf = new FPDF();

        $pdf->AddPage();

        $pdf->SetFont("Arial", "B", 16);

        $pdf->Cell(40, 20, "Hello World");
        $pdf->Output();

    }

    function startPDF(){
        $pdf = new FPDF();
        return $pdf;



    }

    function writePDF(){

        
    }








?>