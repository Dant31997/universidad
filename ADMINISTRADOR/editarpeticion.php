<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "basededatos");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $id = $_GET['id'];
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['equipo'])) {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "basededatos");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $equipo = $_GET['equipo'];
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pide'])) {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "basededatos");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $pide = $_GET['pide'];
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['estado_peticion'])) {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "basededatos");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $estado_peticion = $_GET['estado_peticion'];
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['dia_entrega'])) {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "basededatos");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $dia_entrega = $_GET['dia_entrega'];
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['horario_prestamo'])) {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "basededatos");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $horario_prestamo = $_GET['horario_prestamo'];
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['estado_prestamo'])) {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "basededatos");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $estado_prestamo = $_GET['estado_prestamo'];
}

?>    
<style>
    html{background: linear-gradient(to bottom, white,70%, #FADBD8 ); margin: 0; height: 100vh; display: flex; justify-content: center; align-items: center; 
        }
        body{
        font-family: Arial, sans-serif;
        
    }
    .regresar {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff0000;
            color: #FFF;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            position: absolute;
            top: 90%; left:43%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .regresar:hover {
            background-color: #D62828;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .custom-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff0000;
            color: #FFF;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-left: 35%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .custom-button:hover {
            background-color: #D62828;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
       
        th {
            text-align: center;
        }
        tr {
            text-align: center;
        }
        table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 12px;
            margin-left: 60px;       
            border-collapse: collapse; 
        }

        th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
            border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

        td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
            color: #669;    border-top: 1px solid transparent; }

        tr:hover td { background: #d0dafd; color: #339; }

        .title1 {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
        }

        .login-box {
            width: 400px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px; /* Ajusta el valor para cambiar la curvatura de las esquinas */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
        }

        .btno {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff0000;
            color: #FFF;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-left: 30%;
            margin-top: 1%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btno:hover {
            background-color: #D62828;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .inputcentrado {
            text-align: center;
        }

</style>
<br>
<div class="login-box">
<h3>Editar Peticion</h3>
<br>
        <form action="cambiopeticion.php" method="POST">
            <div class="form-group">
                <label for="cod_inventario">ID:</label>
                <input class="inputcentrado" type="number" style="width : 50px; heigth : 1px" id="cod_inventario" name="cod_inventario" value="<?php echo $id; ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="nom_inventario">Equipo:</label>
                <input type="text" style="width : 100px; heigth : 1px" id="nom_inventario" name="nom_inventario" value="<?php echo $equipo; ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="estadoact">Estado Actual:</label>
                <input disabled type="text" style="width : 80px; heigth : 1px" id="estadoact" name="estadoact" value="<?php echo $estado_peticion; ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" >
                    <option value="Sin revisar">Sin Revisar</option>
                    <option value="Aprovada">Aprovada</option>
                    <option value="Rechazada">Rechazada</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="nombre_persona">Nombre de la persona:</label>
                <input type="text" style="width : 200px; " id="nombre_persona" name="nombre_persona" value="<?php echo $pide; ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="diaentrega">Fecha en que se necesita</label>
                <input type="date" id="diaentrega" name="diaentrega" value="<?php echo $dia_entrega; ?>">
            </div>
            <br>
            <div class="form-group">
                <label for="devolucion">Horario de uso</label>
                <input type="text" id="devolucion" name="devolucion" value="<?php echo $horario_prestamo; ?>">
            </div>
            <br>

            <input class="btno" type="submit" name= "editar" value="Editar Objeto">
            <br>
        </form>
        </div>
    <br>
    <a class ="regresar" href="verificarpeticiones.php">Volver a peticiones</a>