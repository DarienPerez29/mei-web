<?php
session_start();

include 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

// Jalas los datos de todo el usuario
$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

// Jalas los datos del nombre completo del usuario
$consulta_nombre = "SELECT nombre, apellidos FROM usuarios WHERE usuario='$usuario' AND password='$password' ";
$resultado_nombre = $conexion->prepare($consulta_nombre);
$resultado_nombre->execute();

if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    while ($fila = $resultado_nombre->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $datos = $fila[0] . " " . $fila[1];
    }

    $_SESSION["s_usuario"] = $datos;
    
}else{
    $_SESSION["s_usuario"] = null;
    $data=null;
}

print json_encode($data);
$conexion=null;
