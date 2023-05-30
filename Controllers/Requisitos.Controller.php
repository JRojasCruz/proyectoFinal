<?php
require_once '../Models/Requisitos.php';
require_once '../Utils/File.php';

if (isset($_POST['operacion'])) {
  $requisitos = new Requisitos();
  $fileHelper = new FileHelper();
  if ($_POST['operacion'] == 'buscarPostulante') {
    $datos = $requisitos->buscarPostulante($_POST['ar-numdocumento']);
    if ($datos) {
      echo json_encode($datos);
    }
  }
  if ($_POST['operacion'] == 'adjuntarRequisitos') {
    var_dump($_POST);
    $urlCert = $fileHelper->uploadFile("certEstudios",'.pdf');
    $urlPhoto = $fileHelper->uploadFile("foto",'.jpg');
    $urlAntP = $fileHelper->uploadFile("antPoliciales",'.pdf');
    $datos = [
      "nroDocumento" => $_POST['ar-numdocumento'],
      "certEstudios" => $urlCert,
      "foto" => $urlPhoto,
      "certAntPoliciales" => $urlAntP
    ];

    $data = [
      "status" => false
    ];

    $data["status"] = $requisitos->adjuntarRequisitos($datos);

    echo json_encode($data);


  }
}