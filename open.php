<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abrir Caja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <div class="container">
            <h1>Abrir Caja</h1>
            <?php include("func/open_func.php");?>
            <p>Presiona el boton para abrir la caja</p>
            <button class="btn_action" type="submit" id="btn_open" name="btn_open">ABRIR</button>
            <br>
            <a href="home.php">Regresar</a>
        </div> 
    </form>
</body>
</html>