<?php
include 'conexion.php';

if (isset($_GET['edit'])) {
    $codigo = $_GET['edit'];
    $result = $conexion->query("SELECT * FROM tblestudiantes WHERE Codigo=$codigo");
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $carrera = $_POST['carrera'];
    
    $sql = "UPDATE tblestudiantes SET Nombre='$nombre', Fecha_nacimiento='$fecha_nacimiento', carrera='$carrera' WHERE Codigo=$codigo";
    $conexion->query($sql);
    
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante</title>
</head>
<body>
    <h2>Editar Estudiante</h2>
    <form method="POST">
        <input type="hidden" name="codigo" value="<?php echo $row['Codigo']; ?>">
        <input type="text" name="nombre" value="<?php echo $row['Nombre']; ?>" required>
        <input type="date" name="fecha_nacimiento" value="<?php echo $row['Fecha_nacimiento']; ?>" required>
        <input type="text" name="carrera" value="<?php echo $row['carrera']; ?>" required>
        <button type="submit" name="update">Actualizar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>