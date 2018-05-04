<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

function pdf_create($html, $filename = '') {    

    $dompdf = new Dompdf();
    $dompdf->set_option('isHtml5ParserEnabled', true);

    $dompdf->load_html($html);
    $dompdf->setPaper(array(0,0,635,502), 'portrait');
    $dompdf->render();   
    $dompdf->stream($filename, array("Atachment"=>1));
 
}
