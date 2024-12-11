<?php

namespace App;

class PdfModifier
{
    private $reader;
    private $writer;

    public function __construct(PdfReader $reader, PdfWriter $writer)
    {
        $this->reader = $reader;
        $this->writer = $writer;
    }

    public function modify(string $inputPath, string $outputPath, string $customText): void
    {
     
        $content = $this->reader->read($inputPath);

        
        $timestamp = date('Y-m-d H:i:s');
        $modifiedContent = $content . "\n---\nModificado el: $timestamp\n" . $customText;

        
        $this->writer->write($modifiedContent, $outputPath);
    }
}
