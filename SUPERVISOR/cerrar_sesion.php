<?php
// Iniciar o reanudar la sesión
session_start();

// Destruir la sesión actual
session_destroy();

// Redirigir a la página de inicio de sesión
header("Location: http://localhost/universidad/index.html");
?>
