<?php
require_once "../Models/Reportes.php";

if (isset($_POST['operacion'])) {
  $reportes = new Reportes();
  if ($_POST['operacion'] == 'listarMatriculadosPorCarrera') {
    $datos = $reportes->listarMatriculadosPorCarrera($_POST['idCarrera']);
    if ($datos) {
      echo json_encode($datos);
    }
  }
}