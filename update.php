<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Cara</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Actualizar Cara</h1>
        <?php
            session_start();
            include("func/update_img.php");
            echo 'Hola ', $_SESSION['usuario'];
        ?>
        <p>Toma una foto de tu cara y subela.</p>
        <form method="post" enctype="multipart/form-data">
            <input type="file" accept="image/jpeg" id="face" name="face" required>
            <button class="btn_action" type="submit" id="btn_upload" name="btn_upload">Subir</button>
        </form>
        <br>
        <a href="home.php" >Regresar</a>
    </div>
</body>
</html>