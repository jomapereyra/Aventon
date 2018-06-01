<?php 
require_once("../modelo/usuario.php");
session_start();
$email=$_SESSION["usuario"];
$tabla_usuario=new Usuario();
$usuario=$tabla_usuario->get_id($email);
$nombre=$_POST["nombre_usuario"];
$apellido=$_POST["apellido_usuario"];
$pass=$_POST["contraseña"];
$tel=$_POST["telefono_usuario"];
$fn=$_POST["fecha_nacimiento"];
$tabla_usuario->modificar($usuario["id_usuario"],$nombre,$apellido,$pass,$tel,$fn);
header("location:../ver_perfil.php");
?>