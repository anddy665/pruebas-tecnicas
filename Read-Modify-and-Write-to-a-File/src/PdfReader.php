<?php

namespace App;

use Smalot\PdfParser\Parser;

class PdfReader
{
    public function read(string $filePath): string
    {
        if (!file_exists($filePath)) {
            throw new \Exception("El archivo no existe: $filePath");
        }

        $parser = new Parser();
        $pdf = $parser->parseFile($filePath);
        return $pdf->getText();
    }
}
