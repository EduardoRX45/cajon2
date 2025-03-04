<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Proyecto Cajon 2.0</h1>
        <?php
            session_start();
            echo 'Hola ', $_SESSION['usuario'];
        ?>
        <br>
        <a href="open.php" class="btn_action">Abrir Caja</a>
        <br>
        <a href="update.php" class="btn_action">Actualizar Rostro</a>
        <br>
        <form method="post">
            <button id="btn_logout" name="btn_logout">Salir</button>
        </form>
        <?php
        if(isset($_POST["btn_logout"])){
            session_destroy();
            header("location: index.php");
        }
        ?>
    </div>
</body>
</html>