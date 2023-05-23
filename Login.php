<?php
session_start();
if (isset($_SESSION["seguridad"]) && $_SESSION["seguridad"]["login"]) {
	header("Location:./Views/sesna.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>BATIMATRICULA</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body class="bg-dark d-flex justify-content-center align-items-center vh-100">
	<div class="bg-white p-5 rounded-5 text-secondary"style="width:25rem">
		<div class="d-flex justify-content-center">
			<img src="./Img/logo.png" 
			alt="login-icon"
			style="height:7rem"
			/>
		</div>
		<div class="text-center fs-1 fw-bold">Log In</div>
		<form action="" autocomplete="off">
		<div class="input-group mt-4">
			<div class="input-group-text bg-secondary">
				<img src="./Img/ordenanza.png" 
				alt="username-icon"
				style="height: 1rem"
				/>
			</div>
			<input class="form-control" type="text" id="username" placeholder="Username">
		</div>
		<div class="input-group mt-1">
			<div class="input-group-text bg-secondary">
				<img src="./Img/password.png" 
					alt="password-icon"
					style="height: 1rem"
				/>
			</div>
			<input class="form-control shadow-dark" type="password" id="password" placeholder="Password">
		</div>
		</form>
		<div class="d-flex justify-content-around mt-1">
			<div class="d-flex align-items-center">
				<input class="form-check-input" type="checkbox">
				<div class="pt-1" style="font-size: 0.9rem">Remenber me</div>
			</div>
			<div class="pt-1">
				<a href="#" 
				class="text-decoration-none text-primary fw-semibold fst-italic"
				style="font-size: 0.9rem">
				Forgout your password?
				</a>
			</div>
		</div>
		<div class="btn btn-secondary w-100 mt-3 fw-semibold" id="logIn">Log In</div>
		<div class="d-flex gap-1 justify-content-center mt-1">
			<div>Don't have a account?</div>
			<a href="#"class="text-decoration-none text-primary fw-semibold"
			style="font-size: 0.9rem"
			>Register</a>
		</div>
		<div class="p-3">
			<div class="border-bottom text-center"
			style="height: 0.9rem">
				<span class="bg-white px-3">or</span>
			</div>
		</div>
		<div class="btn d-flex gap-2 justify-content-center border mt-3">
			<img src="./Img/google.png" 
			alt="google-icon"
			style="height: 1.6rem;"
			/>
			<div class="fw-semibold text-secondary">
				Continue with google
			</div>
		</div>
	</div>
	<script src="./Js/LogIn.js"></script>
</body>
</html>