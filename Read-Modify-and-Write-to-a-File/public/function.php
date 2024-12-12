<?php
require('./fileDownloader.php');

class FileProcessor
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function handleError($message)
    {
        echo $message;
        exit;
    }

    public function readFileContent()
    {
        if (!is_readable($this->filename) || !$fp = fopen($this->filename, 'r')) {
            $this->handleError("Cannot open file ({$this->filename}) for reading");
        }

        $fileContent = fread($fp, filesize($this->filename));
        fclose($fp);

        return $fileContent;
    }

    public function appendContent($content)
    {
        $currentContent = $this->readFileContent();

        if (strpos($currentContent, $content) === false) {
            if (!$fp = fopen($this->filename, 'a') || fwrite($fp, $content) === false) {
                $this->handleError("Cannot write to file ({$this->filename})");
            }

            fclose($fp);
            echo "<br>Success: Appended content to file ({$this->filename})<br>";
        } else {
            echo "<br>Content already exists in the file.<br>";
        }
    }

    public function getUpdatedContent()
    {
        return $this->readFileContent();
    }

    public function downloadFile()
    {
        $downloader = new FileDownloader();
        $downloader->download($this->filename);
    }
}


$filename = 'test.txt';
$somecontent = "===>This is a new content";

$fileProcessor = new FileProcessor($filename);
$fileProcessor->appendContent($somecontent);

$updatedContent = $fileProcessor->getUpdatedContent();

echo "<br>Updated File Content:<br><pre>{$updatedContent}</pre>";

$fileProcessor->downloadFile();
