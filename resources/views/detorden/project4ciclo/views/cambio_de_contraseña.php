<?php /*
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../views/login.php');
    exit();
};*/?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" type="text/css" href="css/cambio_de_contrasena.css">
</head>
<style>
    html{
    background-image: url("img/index.png");
    background-size: auto;     
}
</style>
<body>
    <div class="cambio-contrasena-container">
        <h2>Cambiar Contraseña</h2>
        <form action="../controllers/UsuarioController.php?option=cambiar_contrasena" method="post">
            <input type="text" id="usuario" name="usuario" placeholder="USUARIO" required><br><br>
            <select id="pregunta_seguridad" name="pregunta_seguridad" required>
                <option value="">Pregunta de seguridad:</option>
                <option value="¿Donde naciste?">¿Donde naciste?</option>
                <option value="¿Cual es tu comida favorita?">¿Cuál es tu comida favorita?</option>
                <option value="¿Cual es tu color favorito?">¿Cuál es tu color favorito?</option>
                <option value="¿Cual fue tu primera mascota?">¿Cuál fue tu primera mascota?</option>
                <option value="¿Cuando es tu cumpleaños?">¿Cuándo es tu cumpleaños?</option>
            </select><br><br>
            <input type="text" id="respuesta_pregunta" name="respuesta_pregunta" placeholder="RESPUESTA" required><br><br>
            <input type="password" id="nueva_contrasena" name="nueva_contrasena" placeholder="NUEVA CONTRASEÑA" required><br><br>
            <input type="submit" value="Cambiar Contraseña">
            
        </form>
    </div>
</body>
</html>