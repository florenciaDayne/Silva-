<?php

$conexion = new mysqli("localhost", "root", "User.sede", "Silva");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'] ?? '';
$apellidop = $_POST['apellidop'] ?? '';
$apellidom = $_POST['apellidom'] ?? '';

if (empty($nombre) || empty($apellidop) || empty($apellidom)) {
    die("Todos los campos son obligatorios");
}

$stmt = $conexion->prepare("INSERT INTO datos (nombre, apellidop, apellidom) VALUES (?, ?, ?)");

if (!$stmt) {
    die("Error en la consulta: " . $conexion->error);
}

$stmt->bind_param("sss", $nombre, $apellidop, $apellidom);

if ($stmt->execute()) {
    echo "Datos guardados correctamente";
} else {
    echo "Error al guardar: " . $stmt->error;
}

$stmt->close();
$conexion->close();

?>
