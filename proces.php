<?php

// Crear conexion a la bazse de datos
$conexion = new mysqli("localhost", "root", "rootroot", "Silva");

//Verificar si hubo error al conectar 
if ($conexion ->connect_error) {
    die("Error de conexion: ". $conexion->connect_error);
}

//Obetener datos enviados desde el formulario 
$nombre = $_POST['nombre'] ?? ''; // si no existe, queda vacio
$apellidop = $_POST['apellidop'] ?? '';
$apellidom = $_POST['apellidom'] ?? '';

//Validar que no esten vacios 
if (empty($nombre) || empty($apellidop) || empty($apellidom)) { 
    die("X Todos los campos son obligatoriosz");
}

//Preparar consulte SQL segura (evita hackeos)
$stmt = $conexion->prepare("INSERT INTO datos (nombre, apellidop, apellidom")

//Vincular variables a la consulta 
$stmt->bind_param("sss", $nombre, $apellidop, $apellidom);
// "sss" significa que los 3 valores son strings 

//Ejecuta<r la consulta 
if ($stms->execute()) { 
    

