<?php 
/*session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../views/login.php');
    exit();}*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="css/registros.css">
</head>
<style>
    html{
    background-image: url("img/index.png");
    background-size: auto;     
    }
</style>
<body>
    <div class="registro-container">
        <h2>Registro</h2>
        <form action="../controllers/procesar_html.php?option=register" method="post">
            <input type="hidden" name="action" value="register">
            <input type="text" id="usuario" name="usuario" placeholder="USUARIO" required><br><br>
            <input type="password" id="contrasena" name="contrasena" placeholder="CONTRASEÑA" required><br><br>
                <select id="pregunta_seguridad" name="pregunta_seguridad" required>
                    <option value="">Pregunta de seguridad:</option>
                    <option value="¿Donde naciste?">¿Donde naciste?</option>
                    <option value="¿Cual es tu comida favorita?">¿Cuál es tu comida favorita?</option>
                    <option value="¿Cual es tu color favorito?">¿Cuál es tu color favorito?</option>
                    <option value="¿Cual fue tu primera mascota?">¿Cuál fue tu primera mascota?</option>
                    <option value="¿Cuando es tu cumpleaños?">¿Cuándo es tu cumpleaños?</option>
                </select><br><br>
            <input type="text" id="respuesta_pregunta" name="respuesta_pregunta" placeholder="RESPUESTA" required><br><br>
            <input type="submit" value="Registrar">
            <p><?php var_dump($_SESSION);?></p>
            
        </form>
    </div>
</body>
</html>