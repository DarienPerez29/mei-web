<?php

$servidor = "localhost";
$user = "root";
$pass = "";
$db = "mei_login";

$conn = mysqli_connect($servidor, $user, $pass, $db);

if(!$conn)
{
    die("No hay conexión: " .mysqli_connect_error());
}

?>