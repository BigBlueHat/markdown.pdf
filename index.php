<?php
require 'vendor/autoload.php';

// TODO: make this so much smarter...
$in_file = $argv[1];
$out_file = __DIR__ . '/' . $argv[2];

$md = new Parsedown();
$html = $md->text(file_get_contents($in_file));

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->addPage();
$pdf->writeHTML($html);
$pdf->Output($out_file, 'F');
