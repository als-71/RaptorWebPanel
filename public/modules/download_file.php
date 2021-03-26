<?php
if (isset($_GET['file_name'])) {
    $path    = '../../private/storage/download/';
    $filename = $path . $_GET['file_name'];
    clearstatcache();
    if (file_exists($filename)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        header('Content-Length: ' . filesize($filename));
        header('Pragma: public');
        flush();
        readfile($filename, true);
        die();
    }
}