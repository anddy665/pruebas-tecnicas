<?php
require('./fileDownloader.php');
$filename = 'test.txt';
$somecontent = "===>This is a new content";


if (is_writable($filename)) {


    if (!$fp = fopen($filename, 'r')) {
        echo "Cannot open file ($filename) for reading";
        exit;
    }


    $fileContent = fread($fp, filesize($filename));
    fclose($fp);


    if (strpos($fileContent, $somecontent) === false) {

        if (!$fp = fopen($filename, 'a')) {
            echo "Cannot open file ($filename)";
            exit;
        }

        if (fwrite($fp, $somecontent) === FALSE) {
            echo "Cannot write to file ($filename)";
            exit;
        }

        fclose($fp);
        echo "==============================>Success, wrote ($somecontent) to file ($filename)<br>";
    } else {
        echo "Content already exists in the file.<br>";
    }

    $fp = fopen($filename, 'r');
    $fileContent = fread($fp, filesize($filename));
    fclose($fp);


    echo "Updated File Content: <br><pre>$fileContent</pre>";
} else {
    echo "The file $filename is not writable";
}

$downloader = new FileDownloader();
$downloader->download($filename);
