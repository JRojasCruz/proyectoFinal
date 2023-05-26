<?php
session_start();
if (!isset($_SESSION["seguridad"]) || !$_SESSION["seguridad"]["login"]) {
  header("Location:../Index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <!-- icono o nombre -->
      <a class="navbar-brand" href="main.php">
        <span class="text-light"><i class="bi bi-building"></i> SENATI</span>
      </a>
      <!-- boton del menu -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- elementos del boton menu -->
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="main.php"><i class="bi bi-bar-chart"></i> Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="matricula.php"><i class="bi bi-card-checklist"></i> Matriculas</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="reportes.html"><i class="bi bi-filetype-pdf"></i> Reportes</a>
          </li>
        </ul>

        <hr class="d-md-none text-white-50">
        <!-- enlaces redes sociales -->
        <ul class="navbar-nav  flex-row flex-wrap text-light">
          <li class="nav-item col-6 col-md-auto p-3">
            <a class="nav-link" href="https://github.com/JRojasCruz/proyectoFinal" target="_blank"><i
                class="bi bi-github"></i> GitHub</a>
          </li>
          <li class="nav-item col-6 col-md-auto p-3">
            <a class="nav-link" href="../Controllers/LogIn.Controller.php?operation=logout"><i
                class="bi bi-box-arrow-in-right"></i> Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-4 text-center">
    <div class="row">
      <div class="col-md-6">
        <h2>Postulantes por carrera</h2>
        <div class="row">
          <div class="col-12">
            <canvas id="graficoCarreras" class="w-100"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <h2>Estado de pago de los matriculados</h2>
        <div class="row">
          <div class="col-12">
            <canvas id="graficoMatriculas" class="w-100"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <script src="../Js/Graphics.js"></script>
</body>

</html>