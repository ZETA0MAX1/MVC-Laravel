<?php 
/*
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
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" type="text/css" href="css/recuperar_contraseña.css">
</head>
<style>
    html{
    background-image: url("img/index.png");
    background-size: auto;     
}
</style>
<body>
    <div class="recu-contraseña">
        <h2>Recuperar Contraseña</h2>
        
        <form action="../controllers/UsuarioController.php?option=recuperar_contrasena" method="post">
            <input type="hidden" name="action" value="verificar">
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
            <input type="submit" value="Recuperar Contraseñas">
            <p><?php var_dump($_SESSION);?></p>
            <?php
            
            ?>
        </form>
    </div>
</body>
</html>
