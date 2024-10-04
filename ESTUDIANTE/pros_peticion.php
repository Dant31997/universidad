<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "basededatos");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

if (isset($_POST['agregarpeticion'])) {
    $nombre = $_POST['nombre'];
    $equipo = $_POST['equipo'];
    $estado_peticion = "Sin Revisar";
    $dia_entrega = $_POST['dia_entrega'];
    $dia_devolucion = $_POST['dia_devolucion'];
    $horario_prestamo = $_POST['horario_prestamo'];


    $sql = "INSERT INTO peticiones_estudiantes (equipo, pide, estado_peticion, dia_entrega, dia_devolucion, horario_prestamo) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('ssssss', $equipo, $nombre, $estado_peticion, $dia_entrega, $dia_devolucion, $horario_prestamo);

    if ($stmt->execute()) {
        echo"<script>alert('peticion realizada');</script>";
    } else {
        echo "Error al agregar el objeto de inventario: " . $stmt->error;
    }
}
?>
<script>alert('peticion realizada');</script>
<script type="text/javascript">
history.back();
</script>
