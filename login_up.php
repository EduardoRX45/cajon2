<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <div class="container">
            <h1>Ingresa al Sistema</h1>
            <?php include("func/login_func.php");?>
            <input type="text" placeholder="Usuario" id="usuario" name="usuario" required>
            <input type="password" placeholder="Contraseña" id="pass" name="pass" required>
            <button type="submit" class="btn_login" id="btn_login" name="btn_login" >Acceder</button>
            <a href="index.php">Regresar</a>
        </div>
    </form>
</body>
</html>