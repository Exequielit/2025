<?php include 'conexion.php'
?>
<?php
include 'header.php'
?>

<?php

if (isset($_POST['add'])) {
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $carrera = $_POST['carrera'];
    
    $sql = "INSERT INTO tblestudiantes (Nombre, Fecha_nacimiento, carrera) VALUES ('$nombre', '$fecha_nacimiento', '$carrera')";
    $conexion->query($sql);
    header("Location: index.php");
}

$result = $conexion->query("SELECT * FROM tblestudiantes");

if (isset($_POST['update'])) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $carrera = $_POST['carrera'];
    
    $sql = "UPDATE tblestudiantes SET Nombre='$nombre', Fecha_nacimiento='$fecha_nacimiento', carrera='$carrera' WHERE Codigo=$codigo";
    $conexion->query($sql);
    header("Location: index.php");
}

if (isset($_GET['delete'])) {
    $codigo = $_GET['delete'];
    $sql = "DELETE FROM tblestudiantes WHERE Codigo=$codigo";
    $conexion->query($sql);
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Estudiantes</title>

    
</head>
<body>
    <br>
    <h2>Agregar Estudiante</h2>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="date" name="fecha_nacimiento" required>
        <input type="text" name="carrera" placeholder="Carrera" required>
        <button type="submit" name="add">Agregar</button>
    </form>

    <h2>Lista de Estudiantes</h2>
    <table>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Fecha de Nacimiento</th>
            <th>Carrera</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['Codigo']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Fecha_nacimiento']; ?></td>
            <td><?php echo $row['carrera']; ?></td>
            <td>
                <a href="edit.php?edit=<?php echo $row['Codigo']; ?>">Editar</a> 
                <a href="?delete=<?php echo $row['Codigo']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>