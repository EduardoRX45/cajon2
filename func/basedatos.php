<?php 
    $bd = new SQLite3('bd.db');
    $bd -> exec ('CREATE TABLE IF NOT EXISTS Usuarios (IdUsuario integer primary key, Usuario string, Contra string)');
?>
