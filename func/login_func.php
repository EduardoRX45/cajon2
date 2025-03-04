<?php 
    include("basedatos.php");
    session_start();

    if(isset($_POST["btn_login"])){
        $user = $_POST["usuario"];
        $pass = $_POST["pass"];
        $query= "SELECT * FROM USUARIOS WHERE Usuario='$user' AND Contra='$pass';";
        $resultado = $bd -> query($query);
        $rows = $resultado -> fetchArray();
        if($rows>0){
            $_SESSION['usuario']=$user;
            header("location: home.php");
        }else{
            echo "<p>Datos no Validos</p>";
        }
    }
    $bd -> close();
?>