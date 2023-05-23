<?php
session_start();
require_once "../Models/LogIn.php";

if(isset($_POST['operation'])){
  $user = new User();
  if($_POST['operation']=='login'){
    $access = [
      "login" => false,
			"apellidos" => "",
			"nombres" => "",
			"idUsuario" => "",
			"rol" => ""
    ];

    $data = $user->logIn($_POST['username']);
    $claveingresada = $_POST['password'];
    if ($data) {
			if (password_verify($claveingresada, $data['claveAcceso'])) {
				$access["login"] = true;
				$access["apellidos"] = $data["apellidos"];
				$access["nombres"] = $data["nombres"];
				$access["idUsuario"] = $data["idUsuario"];
				$access["rol"] = $data["rol"];
			} else {
				$access["mensaje"] = "Contraseña incorrecta";
			}
		} else {
			$access["mensaje"] = "El usuario ingresado no existe";
		}
		$_SESSION["seguridad"] = $access;

		echo json_encode($access);
  }

}
if(isset($_GET['operacion'])){
	if ($_GET["operacion"] == "logout") {
		session_destroy();
		session_unset();
		header('Location:../Login.php');
	}
}