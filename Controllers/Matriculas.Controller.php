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
  if ($_POST['operacion'] == 'registrarMatricula'){
    // Capturar los datos
      $datosGuardar = [
        "nombres"           => $_POST['r-nombres'],
        "apellidos"         => $_POST['r-apellidos'],
        "tipoDocumento"     => $_POST['r-tipodoc'],
        "nroDocumento"      => $_POST['r-numdoc'],
        "nroCelular"        => $_POST['r-numcel'],
        "email"             => $_POST['r-email'],
        "idCarrera"         => $_POST['r-carreras'],
        "metodoPago"        => $_POST['r-metodopago']
      ];
    // Llamar a la función para registrar la matrícula y obtener el resultado
    $resultado = $matriculados->registrarMatricula($datosGuardar);

    // Preparar la respuesta JSON
    $respuesta = [
      "status" => ($resultado===0), // Establecer el estado según el resultado
      "errorCode" => ($resultado) // Agregar el código de error si es necesario // Establecer el estado según el resultado
  ];
    echo json_encode($respuesta);
  }
  if ($_POST['operacion'] == 'eliminarMatricula') {
    $datos = $matriculados->eliminarMatricula($_POST['idMatricula']);
      echo json_encode($datos);
  }
  if ($_POST['operacion'] == 'procesarPago') {
    $datos = $matriculados->procesarPagos($_POST['ar-numdocumento']);
    echo json_encode($datos);
  }
}