<?php
require_once "../Models/Matriculas.php";

if (isset($_POST['operacion'])) {
  $matriculados = new Matriculados();
  if ($_POST['operacion'] == 'listar') {
    $datos = $matriculados->listarMatriculados();
    if ($datos) {
      echo json_encode($datos);
    }
  }
  if ($_POST['operacion'] == 'listarCarreras') {
    $datos = $matriculados->listarCarreras();
    if ($datos) {
      echo json_encode($datos);
    }
  }
  if ($_POST['operacion'] == 'listarMetodoPago') {
    $datos = $matriculados->listarMetodoPago();
    if ($datos) {
      echo json_encode($datos);
    }
  }
  if ($_POST['operacion'] == 'registrarMatricula'){
    //Capturar los datos
    $datosGuardar = [
      "nombres"           => $_POST['r-nombres'],
      "apellidos"         => $_POST['r-apellidos'],
      "tipoDocumento"     => $_POST['r-tipodoc'],
      "nroDocumento"      => $_POST['r-numdoc'],
      "nroCelular"        => $_POST['r-numcel'],
      "email"             => $_POST['r-email'],
      "idCarrera"         => $_POST['r-carreras'],
      "idMetodoPago"      => $_POST['r-metodopago']

    ];
    $respuesta = [
      "status"=> false
    ];

    $respuesta["status"] = $matriculados->registrarMatricula($datosGuardar);

    echo json_encode($respuesta);
  }
  if ($_POST['operacion'] == 'buscarPostulante') {
    $datos = $matriculados->buscarPostulante($_POST['ar-numdocumento']);
    if ($datos) {
      echo json_encode($datos);
    }
  }
  if ($_POST['operacion'] == 'procesarPago') {
    $datos = $matriculados->procesarPagos($_POST['ar-numdocumento']);
    if ($datos) {
      echo json_encode($datos);
    }
  }
}