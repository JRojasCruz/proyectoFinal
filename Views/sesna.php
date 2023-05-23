<?php
session_start();
if (!isset($_SESSION["seguridad"]) || !$_SESSION["seguridad"]["login"]) {
	header("Location:../Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SENATI</title>
  <link rel="stylesheet" href="../Styles/sidenav.css">
</head>

<body>
  <div class="hamburger">
    <ion-icon name="grid-outline"></ion-icon>
  </div>
  <nav class="active">
    <section class="section">
      <div class="user">
        <div class="user-img">
          <ion-icon name="chevron-back-outline"></ion-icon>
          <div class="img">
            <img src="../Img/empleado.png" alt="">
          </div>
        </div>
        <?php
					if (isset($_SESSION["seguridad"]) && $_SESSION["seguridad"]["login"]) {
						$nombreUsuario = $_SESSION["seguridad"]["nombres"] . ' ' . $_SESSION["seguridad"]["apellidos"];
						echo '<div class="user-name">' . $nombreUsuario. '</div>';
          }
          ?>
      </div>
    </section class="section">
    <section class="section">
      <ul>
        <li>
          <a href="" class="active">
            <ion-icon name="speedometer-outline"></ion-icon>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="">
            <ion-icon name="people-outline"></ion-icon>
            <span class="text">Users</span>
          </a>
        </li>
        <li>
          <a href="">
            <ion-icon name="document-outline"></ion-icon>
            <span class="text">Reports PDF</span>
          </a>
        </li>
        <li>
          <a href="">
            <ion-icon name="add-outline"></ion-icon>
            <span class="text">Etc</span>
          </a>
        </li>
      </ul>
    </section>
    <section class="section">
      <ul>
        <li>
          <a href="">
            <ion-icon name="analytics-outline"></ion-icon>
            <span class="text">Analytics</span>
          </a>
        </li>
        <li>
          <a href="">
            <ion-icon name="airplane-outline"></ion-icon>
            <span class="text">Test</span>
          </a>
        </li>
        <li>
          <a href="">
            <ion-icon name="accessibility-outline"></ion-icon>
            <span class="text">Postulantes</span>
          </a>
        </li>
      </ul>
    </section>
    <section class="section">
      <ul>
        <li>
          <a href="">
            <ion-icon name="settings-outline"></ion-icon>
            <span class="text">Settings</span>
          </a>
        </li>
        <li>
          <a href="../Controllers/LogIn.Controller.php?operacion=logout">
            <ion-icon name="log-out-outline"></ion-icon>
            <span class="text">Log Out </span>
          </a>
        </li>
      </ul>
    </section>
  </nav>
  </div>
  <script>
  hamburger = document.querySelector(".hamburger");
  nav = document.querySelector("nav");
  backBtn = document.querySelector(".user-img");
  hamburger.onclick = function() {
    nav.classList.add("active");
    hamburger.classList.add("hidden");
  }
  backBtn.onclick = function() {
    nav.classList.remove("active");
    hamburger.classList.remove("hidden");
  }
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>