<!DOCTYPE html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nombre'])) {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "basededatos");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $nombre = $_GET['nombre'];
}

?>
<html>
<head>
    <title>Bienvenido</title>
    <style>
        html{
            background: linear-gradient(white,60%,#FADBD8 );height:655px;
        }

        header {
            display: flex;
            justify-content:space-between;
            align-items: center;
            height: 70px;
            padding: 10px;
            background-color: red;
            border-radius: 10px;
        }
        body{
        font-family: Arial, sans-serif;
        margin-top: 1%; 
            margin-left:1%;
            margin-bottom: 33.8%;
    }
        .container {
            color: white;
            width: 100%;
            height: 75px;
            position: absolute;
            padding-bottom: 8px;
            top: 0%; left:0%;
            background-color: red;
            border-bottom: #943126 10px solid;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }
        .logout-button {
            background-color: #ff0000;
            color: #fff;
            font-size: small;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            position: absolute;
            top: 10px; left: 89%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logout-button:hover {
            background-color: #D62828;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        nav a {
            font-weight: 800;
            padding-right: 10px;
        }
        .buttonM {
            background-color: #ff0000;
            color: #fff;
            font-size: small;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px; 
            position: absolute;
            top: 65%; left: 33%;
        }
        .buttonM:hover {
            background-color: #D62828;
        }
        h2 {
            text-align: center;
        }
        th {
            text-align: center;
        }
        tr {
            text-align: center;
        }
        table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 13px;
            margin-top: 10%;     
            border-collapse: collapse; 
        }

        th {     font-size: 15px;     padding: 8px;     background: red;
            border-top: 4px solid #FC472F;    border-bottom: 1px solid #fff; color: white; font-weight: bold; }

        td {    padding: 8px;     background: white;     border-bottom: 1px solid black;
            color: black;    border-top: 1px solid transparent; }

        tr:hover td { background: #d0dafd; color: black; }

        .pagination {
        text-align: center;
    }

    .pagination a {
        display: inline-block;
        padding: 5px 10px;
        margin: 2px;
        border: 1px solid #ddd;
        text-decoration: none;
        color: #333;
    }

    .pagination a.active {
        background-color: #0074D9;
        color: #fff;
        border: 1px solid #0074D9;
    }

    .login-box {
            width: 320px;
            height: 380px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px; /* Ajusta el valor para cambiar la curvatura de las esquinas */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 19%; left: 70%;
        }
        .form-group {
            margin-left: 16px;
        }

        .custom-button3 {
            background-color: #ff0000;
            color: #fff;
            font-size: small;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 9px; 
            position: absolute;
            top: 70%; left: 78.4%;
            border: #333 solid 2px;
        }
    </style>
    
</head>
<body>
        <div class="container">
            <h2>Bienvenido ¡<?php echo $nombre; ?>!</h2>
        </div>
        <nav>
            <a href="cerrar_sesion.php" class="logout-button">Cerrar Sesión</a>
        </nav> 
    <?php
             
        // Consulta SQL con LIMIT para obtener registros de la página actual
        $rol_b = "Estudiante";
        $sql = "SELECT i.nombre_persona, i.nom_inventario, i.estado, i.fecha_entrega, i.hora_entrega, i.fecha_regreso, i.hora_regreso FROM inventario as i inner JOIN usuarios as e ON i.nombre_persona = e.nombre WHERE i.nombre_persona = '$nombre' AND e.rol = '$rol_b'";
        $resultado = $conexion->query($sql);
        
        
        // Calcular el número total de páginas
        //$numTotalPaginas = ceil($totalRegistros / $registrosPorPagina); 

        if ($resultado->num_rows > 0) {
        echo "<table border='1'>";
        echo "<th style=width:100px;>Estudiante</th><th>Nombre del equipo</th><th>Estado</th><th>Fecha de Entrega</th><th>Hora de entrega</th><th>Fecha de regreso</th><th>Hora de regreso</th></tr>";
        
        while($row = $resultado->fetch_assoc()) {
            
                echo "<tr>";
                echo "<td>" .$row["nombre_persona"]. "</td>";
                echo "<td>" .$row["nom_inventario"]. "</td>";
                echo "<td>" .$row["estado"]. "</td>";
                echo "<td>" .$row["fecha_entrega"]. "</td>";
                echo "<td>" .$row["hora_entrega"]. "</td>";
                echo "<td>" .$row["fecha_regreso"]. "</td>";
                echo "<td>" .$row["hora_regreso"]. "</td>";
                echo "</tr>";
         }     
        echo "</table>";
        } else {
            echo "<table border='1'>";
            echo "<th style=width:100px;>Estudiante</th><th style=width:125px;>Nombre del equipo</th><th>Estado</th><th style=width:125px;>Fecha de Entrega</th><th style=width:125px;>Hora de entrega</th><th style=width:125px;>Fecha de regreso</th><th style=width:125px;>Hora de regreso</th></tr>";
            echo "<br>";
            echo " <td>No tiene prestamos activos en el momento</td>";
            echo " <td>-</td>";
            echo " <td>-</td>";
            echo " <td>-</td>";
            echo " <td>-</td>";
            echo " <td>-</td>";
            echo " <td>-</td>";
            echo "</table>";
    }
    
    ?>
<div class="login-box">
    <h2>PRESTAMOS</h2>

        <form action="pros_peticion.php" method="POST">

            <div class="form-group">
                <label for="nombre">Nombre del encargado:</label>
                <input type="text" style="width : 100px;" class="inputcentrado" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
            </div>
            <br>
              <div class="form-group">
                <label for="equipo">¿Qué equipo necesitas?</label>
                <select id="equipo" name="equipo" >
                    <option value="Portatil">Portatil</option>
                    <option value="Tablet">Tablet</option>
                </select>
                </div>
                <br>
                <div class="form-group">
                <label for="dia_entrega">Fecha de prestamo:</label>
                <input type="date" style="width : 100px;"  id="dia_entrega" name="dia_entrega" value="">
            </div>
            <br>
            <div class="form-group">
                <label for="dia_devolucion">Fecha de devolucion:</label>
                <input type="date" id="dia_devolucion" name="dia_devolucion" value="">
            </div>
            <br>
            <div class="form-group">
                <label for="horario_prestamo">Horario de prestamo:</label>
                <input type="text" style="width : 130px;" id="horario_prestamo" name="horario_prestamo" value="">
            </div>
            <br>
            <div class="form-group">
                <input class="buttonM" type="submit" name= "agregarpeticion" value="Enviar peticion">
            </div>
        </form>
</div>
<?php
    echo "<a class='custom-button3' href='verpeticiones.php?nombre=$nombre'>Ver peticiones</a>";
?>
</body>
</html>
