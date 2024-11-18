<?php
require_once('../estudiante/conexion.php');
require_once('../estudiante/clases/Estudiante.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar el estudiante actual
    $sql = "SELECT * FROM estudiante WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    $estudianteData = mysqli_fetch_assoc($resultado);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];

    // Crear instancia y actualizar estudiante
    $estudiante = new Estudiante($conexion, $nombre, $edad, $correo);
    $estudiante->actualizarEstudiante($id);

    header("Location: index.php"); // Redirige al índice después de editar
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
</head>
<body>
    <h1>Editar Estudiante</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $estudianteData['id']; ?>">
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $estudianteData['nombre']; ?>" required>
        <input type="number" name="edad" placeholder="Edad" value="<?php echo $estudianteData['edad']; ?>" required>
        <input type="email" name="correo" placeholder="Correo" value="<?php echo $estudianteData['correo']; ?>" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
