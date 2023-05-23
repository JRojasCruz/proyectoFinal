<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
  <link rel="stylesheet" href="../Styles/sidenav.css">
  <link rel="stylesheet" href="../Styles/index-style.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row flex-nowrap">
    <div class="bg-dark col-auto col-md-2 min-vh-100 d-flex flex-column justify-content-between">
      <div class="bg-dark p-2">
        <a href="" class="d-flex text-decoration-none mt-1 align-items-center text-light">
          <i class="fs-5 fa fa-guage"></i><span class="fs-4 d-none ms-1 d-sm-inline">Enrollment Registration</span>
          <ul class="nav nav-pills flex-column mt-4">
            <li class="nav-item py-2 py-sm-0">
              <a href="#" class="nav-link text-light">
                <i class="fs-5 fa  fa-id-card"></i><span class="fs-4 ms-1 d-none d-sm-inline">Register here</span>
              </a>
            </li>
            <li class="nav-item py-2 py-sm-0">
              <a href="#" class="nav-link text-light">
                <i class="fs-5 fa fa-file-pdf"></i><span class="fs-4 ms-1 d-none d-sm-inline">Reports PDF</span>
              </a>
            </li>
            <li class="nav-item py-2 py-sm-0">
              <a href="#" class="nav-link text-light">
                <i class="fs-5 fa-solid fa-pencil"></i><span class="fs-4 ms-1 d-none d-sm-inline">Graphics</span>
              </a>
            </li>
          </ul>
        </a>
      </div>
      <div class="dropdown open p-3">
        <?php
					if (isset($_SESSION["seguridad"]) && $_SESSION["seguridad"]["login"]) {
						$nombreUsuario = $_SESSION["seguridad"]["nombres"] . ' ' . $_SESSION["seguridad"]["apellidos"];
						echo '
            <button class="btn border-none dropdown-toggle text-light" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i><span class="ms-2">'. $nombreUsuario.'</span>
            </button>';
					}
					?>
        <div class="dropdown-menu" aria-labelledby="triggerId">
          <button class="dropdown-item" href="#">Perfil</button>
          <button class="dropdown-item" href="#">Action</button>
          <li><a class="dropdown-item" href="../Controllers/LogIn.Controller.php?operacion=logout">Log Out</a></li>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/f5edb5ee55.js" crossorigin="anonymous"></script>

</body>
</html>