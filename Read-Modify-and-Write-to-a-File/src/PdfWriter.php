<?php

namespace App;

use Setasign\Fpdf\Fpdf;

class PdfWriter
{
    public function write(string $content, string $outputPath): void
    {

        $pdf = new Fpdf();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);


        $lines = explode("\n", $content);
        foreach ($lines as $line) {
            $pdf->MultiCell(0, 10, $line);
        }


        if (!$pdf->Output('F', $outputPath)) {
            throw new \Exception("No se pudo escribir el archivo PDF: $outputPath");
        }
    }
}
