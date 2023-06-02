<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reportes</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"
    />
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid">
        <!-- icono o nombre -->
        <a class="navbar-brand" href="main.php">
          <span class="text-light"><i class="bi bi-building"></i> SENATI</span>
        </a>
        <!-- boton del menu -->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#menu"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- elementos del boton menu -->
        <div class="collapse navbar-collapse" id="menu">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="main.php"
                ><i class="bi bi-bar-chart"></i> Inicio</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="matricula.php"
                ><i class="bi bi-card-checklist"></i> Matriculas</a
              >
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                data-bs-toggle="dropdown"
                href=""
                ><i class="bi bi-filetype-pdf"></i> Reportes</a
              >
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="./reportepdf1.php"
                    >Reporte PDF 1</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="./reportepdf2.php"
                    >Reporte PDF 2</a
                  >
                </li>
              </ul>
            </li>
          </ul>

          <hr class="d-md-none text-white-50" />
          <!-- enlaces redes sociales -->
          <ul class="navbar-nav flex-row flex-wrap text-light">
            <li class="nav-item col-6 col-md-auto p-3">
              <a
                class="nav-link"
                href="https://github.com/JRojasCruz/proyectoFinal"
                target="_blank"
                ><i class="bi bi-github"></i> GitHub</a
              >
            </li>
            <li class="nav-item col-6 col-md-auto p-3">
              <a
                class="nav-link"
                href="../Controllers/LogIn.Controller.php?operation=logout"
                ><i class="bi bi-box-arrow-in-right"></i> Logout</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="text-center mt-3">
        <h2>Exportar datos PDF</h2>
      </div>
      <div class="card">
        <div class="card-header bg-dark text-light">
          FILTRAR POR FECHA DE INICIO, FIN Y CARRERAS
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-9">
              <div class="form-floating">
                <select
                  name="listaCarreras"
                  id="listaCarreras"
                  class="form-select"
                >
                  <option value="">--Selecciona--</option>
                </select>
                <label for="filtrarCarrera">Filtrar por carreras</label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="d-grid">
                <button
                  type="button"
                  class="btn btn-dark text-light"
                  id="exportPDF"
                >
                  Exportar archivo PDF
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table id="tbReporte1" class="table table-sm table-striped">
            <thead class="bg-dark text-light">
              <tr>
                <th>ID</th>
                <th>Carrera</th>
                <th>Datos del postulante</th>
                <th>Estado matrícula</th>
                <th>Pago de la matrícula</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="../Js/Reportes.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
