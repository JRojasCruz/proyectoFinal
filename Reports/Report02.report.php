<?php

require_once '../vendor/autoload.php';
require_once '../Models/Reportes.php'; //Modelo de los reports aqui

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {

    //Instanciar clase de los matriculados
    $Reportes = new Reportes();
    $datos = $Reportes->listarPorMetodoPago($_GET['idCarrera'],$_GET['metodopago']);
    $titulo = $_GET['nombreCarrera'];

    ob_start();
    //Hoja de estilos
    include './Styles/style.report.html';
    //Archivos de datos
    include './Report02.data.php';
    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'es');
    $html2pdf->writeHTML($content);
    $html2pdf->output('Metododepago.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}