<?php

class FileDownloader
{
    private $basePath;

    public function __construct($basePath = 'downloads')
    {
        $this->basePath = $basePath;
    }

    public function download($file)
    {
        $fileName = basename($file);
        $filePath = './' . $fileName;

        if (file_exists($filePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Content-Length: ' . filesize($filePath));

            readfile($filePath);
            exit;
        } else {
            http_response_code(404);
            die();
        }
    }
}
