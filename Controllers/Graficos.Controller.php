<?php
require_once "../Models/Graficos.php";

if (isset($_POST['operacion'])) {
  // Graficar carreras
  if ($_POST['operacion'] == 'graficar') {
    $graphic = new Grafico();
    $datos = $graphic->graficarCarreras();
    if ($datos) {
      echo json_encode($datos);
    }
  }
  if ($_POST['operacion'] == 'graficarPagos') {
    $graphic = new Grafico();
    $datos = $graphic->graficarPagos();
    if ($datos) {
      echo json_encode($datos);
    }
  }
}