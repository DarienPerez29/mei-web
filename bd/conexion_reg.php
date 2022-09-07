<?php

$servidor = "localhost";
$user = "darien_test";
$pass = "darien_test";
$db = "mei_db";

$conn = mysqli_connect($servidor, $user, $pass, $db);

if(!$conn)
{
    die("No hay conexión: " .mysqli_connect_error());
}

?>