<?php
require_once('../estudiante/conexion.php');
require_once('../estudiante/clases/Estudiante.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];

    $estudiante = new Estudiante($conexion, $nombre, $edad, $correo);
    $estudiante->registrarEstudiante();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Estudiante</title>
</head>
<body>
    <h1>Registrar Estudiante</h1>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="number" name="edad" placeholder="Edad" required>
        <input type="email" name="correo" placeholder="Correo" required><br><br>
        <button type="submit">Registrar</button><br><br>
        <a href="index.php">Vover a la lista</a>
    </form>
</body>
</html>