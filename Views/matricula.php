<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Matricula</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

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
            <a class="nav-link" aria-current="page" href="main.php"><i class="bi bi-bar-chart"></i> Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="matricula.html"><i class="bi bi-card-checklist"></i> Matriculas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reportes.html"><i class="bi bi-filetype-pdf"></i> Reportes</a>
          </li>
        </ul>

        <hr class="d-md-none text-white-50" />
        <!-- enlaces redes sociales -->
        <ul class="navbar-nav flex-row flex-wrap text-light">
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
  <div class="container mt-4">
    <div class="text-center mt-3">
      <h2>Matriculate aquí</h2>
    </div>
    <!-- Formulario filtro -->
    <div class="card">
      <div class="card-header bg-dark text-light">
        Registra o edita una matrícula
      </div>
      <div class="card-body text-center">
        <div class="row">
          <!-- Modal registrar-->
          <div class="col-md-4 mb-3 mt-3">
            <div class="form-floating">
              <!-- Button registrar modal -->
              <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalMatricula">
                Registrar nueva matricula
              </button>

              <div class="modal fade" id="modalMatricula" data-bs-backdrop="static" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content">
                    <div class="modal-header bg-dark">
                      <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">
                        REGISTRAR MATRÍCULA
                      </h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="" autocomplete="off" id="formRegistrarMatricula" name="formRegistrarMatricula">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label for="nombres" class="col-sm-4 col-form-label">Nombres:</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" id="r-nombres" name="r-nombres">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label for="apellidos" class="col-sm-4 col-form-label">Apellidos:</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" id="r-apellidos" name="r-apellidos">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label for="tipodoc" class="col-sm-4 col-form-label">T. Documento:</label>
                              <div class="col-sm-8">
                                <select id="r-tipodoc" name="r-tipodoc" class="form-control">
                                  <option value="">-- Seleccione</option>
                                  <option value="DNI">DNI</option>
                                  <option value="CE">CE</option>
                                  <!-- Agrega más opciones de tipo de documento aquí -->
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label for="numdoc" class="col-sm-4 col-form-label">N. Documento:</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" id="r-numdoc" name="r-numdoc">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label for="numcel" class="col-sm-4 col-form-label">Celular:</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" id="r-numcel" name="r-numcel">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label for="email" class="col-sm-4 col-form-label">Email:</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" id="r-email" name="r-email">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label for="r-carreras" class="col-sm-4 col-form-label">Carreras:</label>
                              <div class="col-sm-8">
                                <select id="r-carreras" name="r-carreras" class="form-select">
                                  <option value="">-- Seleccione</option>
                                  <!-- Agrega más opciones de carrera aquí -->
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label for="metodopago" class="col-sm-4 col-form-label">Metodo de pago:</label>
                              <div class="col-sm-8">
                                <select id="r-metodopago" name="r-metodopago" class="form-select">
                                  <option value="">-- Seleccione</option>
                                  <!-- Agrega más opciones de carrera aquí -->
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer bg-dark mt-2">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                      </button>
                      <button type="button" class="btn btn-success" id="btnRegistrarMatricula">
                        Registrar
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin del modal de registrar -->

          <!-- Modal adjuntar requisitos -->
          <div class="col-md-4 mb-3 mt-3">
            <div class="form-floating">
              <!-- Boton abrir modal -->
              <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalRequisitos">
                Adjuntar requisitos
              </button>
              <!--Modal requisitos  -->
              <div class="modal fade" id="modalRequisitos" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">
                        ADJUNTAR REQUISITOS
                      </h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" id="ar-numdocumento" name="ar-numdocumento" placeholder="Ingresa el número de documento"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                              <button class="btn btn-outline-secondary" type="button" id="btnBuscarPostulante"><i
                                  class="bi bi-search"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label for="foto" class="col-sm-4 col-form-label">Postulante:</label>
                            <div class="col-sm-8">
                              <input type="input" class="form-control" id="ar-Postulante" name="ar-Postulante" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label for="foto" class="col-sm-4 col-form-label">Cert. Estudios:</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" id="ar-certestudios" name="ar-certestudios">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label for="foto" class="col-sm-4 col-form-label">Foto:</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" id="ar-foto" name="ar-foto">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label for="antpoliciales" class="col-sm-4 col-form-label">Ant. Policiales:</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" id="ar-antpoliciales" name="ar-antpoliciales">
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer bg-dark">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                      </button>
                      <button type="button" class="btn btn-primary">
                        Adjuntar
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin modal adjuntar requisitos -->

          <!-- Modal eliminar matrícula -->
          <div class="col-md-4 mb-3 mt-3">
            <div class="form-floating">
              <!-- Boton abrir modal -->
              <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalEliminar">
                Adjuntar requisitos
              </button>
              <!--Modal requisitos  -->
              <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">
                        ELIMINAR MATRÍCULA
                      </h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Ingresa el número de documento"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                              <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                  class="bi bi-search"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label for="foto" class="col-sm-4 col-form-label">Postulante:</label>
                            <div class="col-sm-8">
                              <input type="input" class="form-control" id="ar-Postulante" name="ar-Postulante" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer bg-dark">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                      </button>
                      <button type="button" class="btn btn-primary">
                        Eliminar
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin modal eliminar matrícula -->

          <!-- Modal eliminar matrícula -->
          <div class="col-md-4 mb-3 mt-3">
            <div class="form-floating">
              <!--Modal requisitos  -->
              <div class="modal fade" id="modalPago" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">
                        PROCESAR PAGO
                      </h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Ingresa el número de documento"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                              <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                  class="bi bi-search"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer bg-dark">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                      </button>
                      <button type="button" class="btn btn-primary">
                        Pagar
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin modal eliminar matrícula -->

        </div>
      </div>
    </div>
    <!-- Tabla -->
    <div class="row mt-2">
      <div class="col-md-12">
        <table id="tbMatriculas" class="table table-sm table-striped">
          <thead class="bg-dark text-light text-center">
            <tr>
              <th>ID</th>
              <th>Datos del postulante</th>
              <th>Carrera</th>
              <th>Cert. de Estudios</th>
              <th>Foto</th>
              <th>Ant. Policiales</th>
              <th>Estado</th>
              <th>Pagos</th>
              <th>Operaciones</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <!-- DATOS DE LA TABLA -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../Js/Matricula.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
</body>

</html>