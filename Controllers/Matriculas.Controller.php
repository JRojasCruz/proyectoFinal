<?php
require_once "../Models/Matriculados.php";

if (isset($_POST['operacion'])) {
  // Graficar carreras
  if ($_POST['operacion'] == 'listar') {
    $graphic = new Matriculados();
    $datos = $graphic->listarMatriculados();
    if ($datos) {
      echo json_encode($datos);
    }
  }
}