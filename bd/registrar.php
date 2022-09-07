<?php

include("conexion_reg.php");

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$nombreEmp = $_POST["nombremp"];
$tel = $_POST["tel"];
$correo = $_POST["correo"];
$nombreu = $_POST["usuario"];
$pass = $_POST["contraseña"];


if(isset($_POST["btnregistrar"]));

    $insertar = "INSERT INTO usuarios VALUES ('', '$nombre', '$apellidos', '$nombreEmp', '$tel', '$correo', '$nombreu', '$pass')";

    //Validar correo.
    $verificarcorreo = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo_electronico = '$correo'");

    if(mysqli_num_rows($verificarcorreo) > 0){
    echo "<script> alert('El correo ya está registrado, intenta con otro.');  window.location='../pages/sign-up.html' </script>";
    exit();
    }


    //Validar usuario.
    $verificarusuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario = '$nombreu'");

    if(mysqli_num_rows($verificarusuario) > 0){
    echo "<script> alert('El nombre de usuario ya está registrado, intenta con otro.');  window.location='../pages/sign-up.html' </script>";
    exit();
    }

    $ejecutar = mysqli_query($conn, $insertar);

    if($ejecutar){
        echo "<script> alert('Usuario registrado con exito'); window.location='../pages/login.html' </script>";
    }
    else{
        echo "Error: ".$insertar."<br>".mysql_error($conn);
    }

?>  