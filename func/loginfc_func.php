<?php 
    include("basedatos.php");
    session_start();
    if(isset($_POST["btn_log"])){
        $user=$_POST['usuario'];
        $query="SELECT * FROM USUARIOS WHERE Usuario = '$user';";
        $resultado= $bd -> query($query);
        $rows = $resultado -> fetchArray();
        if($rows>0){
            $_SESSION['usuario']= $user;
            header("location: login_face2.php");
        }else{
            echo "Usuario no valido";
        }
    }
    $bd -> close();
?>