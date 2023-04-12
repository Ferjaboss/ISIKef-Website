<?php
$id = $_GET['id'];
$path = 'pdfs/' . $id . '.pdf';

header('Content-Type: application/pdf');
header('Content-Disposition: inline; id="' . $id . '.pdf"');
header('Content-Length: ' . filesize($path));

readfile($path);
?>