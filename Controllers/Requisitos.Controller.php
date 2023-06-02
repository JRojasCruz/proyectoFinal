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
    $urlCert = $fileHelper->uploadFile("ar-certestudios",'.pdf');
    $urlPhoto = $fileHelper->uploadFile("ar-foto",'.jpg');
    $urlAntP = $fileHelper->uploadFile("ar-antpoliciales",'.pdf');
    $datos = [
      "idMatricula" => $_POST['idMatricula'],
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