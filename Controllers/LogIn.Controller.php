<?php
require_once "../Models/LogIn.php";
if(isset($_GET['operation'])){
  $user = new User();
  if($_GET['operation'=='login']){
    $access = [
      "login" => false,
			"apellidos" => "",
			"nombres" => "",
			"idUsuario" => "",
			"rol" => ""
    ];
    $data = $user->logIn($_GET['username']);
    $claveingresada = $_GET['password'];
    if ($data) {
			if (password_verify($claveingresada, $data["claveAcceso"])) {
				$access["login"] = true;
				$access["apellidos"] = $data["apellidos"];
				$access["nombres"] = $data["nombres"];
				$access["idUsuario"] = $data["idUsuario"];
				$access["nombreRol"] = $data["nombreRol"];
			} else {
				$access["mensaje"] = "Contraseña incorrecta";
			}
		} else {
			$acceso["mensaje"] = "Nombre de usuario y contraseña no encontrados";
		}
		$_SESSION["seguridad"] = $acceso;

		echo json_encode($acceso);
  }
}