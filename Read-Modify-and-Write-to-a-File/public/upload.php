<?php
require '../vendor/autoload.php';

use App\PdfReader;
use App\PdfWriter;

if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $sourceDir = __DIR__ . './source/';
    $outputDir = __DIR__ . './output/';
    $fileName = basename($_FILES['file']['name']);
    $filePath = $sourceDir . $fileName;


    move_uploaded_file($_FILES['file']['tmp_name'], $filePath);

    try {

        $reader = new PdfReader();
        $content = $reader->read($filePath);


        $customText = "Archivo procesado con éxito.";
        $timestamp = date('Y-m-d H:i:s');
        $modifiedContent = $content . "\n---\nModificado el: $timestamp\n" . $customText;


        $writer = new PdfWriter();
        $outputPath = $outputDir . 'modified-' . $fileName;
        $writer->write($modifiedContent, $outputPath);


        echo json_encode(['success' => true, 'message' => 'Archivo procesado.', 'outputFile' => 'output/modified-' . $fileName]);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Error al subir el archivo.']);
}
