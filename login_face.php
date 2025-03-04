<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Face</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<form method="post">
		<div class="container">
			<h1>Ingresa al Sistema</h1>
			<?php include("func/loginfc_func.php"); ?>
			<input type="text" placeholder="Usuario" id="usuario" name="usuario" required>
			<button class="btn_login" id="btn_log" name="btn_log" type="submit">Acceder</button>
			<a href="index.php">Regresar</a>
		</div>
	</form>
</body>
</html>