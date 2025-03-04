<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <div class="container">
            <h1>Registrar Usuario</h1>
            <?php include("func/registro_func.php");?>
            <input type="text" placeholder="Usuario" id="usuario" name="usuario" required>
            <input type="password" placeholder="Contraseña" id="pass" name="pass" required>
            <p>Selecciona una imagen de tu cara</p>
            <input type="file" accept="image/jpeg" id="face" name="face" required>
            <button type="submit" class="btn_login" id="btn_reg" name="btn_reg" >Registrar</button>
            <a href="index.php">Regresar</a>
        </div>
    </form>
</body>
</html>