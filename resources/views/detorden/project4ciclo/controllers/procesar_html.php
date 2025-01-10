<?php
require_once("../models/usuario.php");

//Usuario::check_login('../views/login.php');
$action = isset($_GET['option']) ? $_GET['option'] : '';

switch ($action) {
    case 'register':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Procesar el registro
            $nombre = $_POST['usuario'];
            $password = $_POST['contrasena'];
            $pregunta_seguridad = isset($_POST['pregunta_seguridad']) ? $_POST['pregunta_seguridad'] : '';
            $respuesta_pregunta = isset($_POST['respuesta_pregunta']) ? $_POST['respuesta_pregunta'] : '';
            
            $usuario = new Usuario($nombre, $password, $pregunta_seguridad, $respuesta_pregunta);
            $registrado = $usuario->RegistrarUsuario();
            
            if ($registrado) {
                header("Location: ../views/login.php");
                
                exit; // Termina el script después de redirigir
            } else {
                echo "Error al registrar el usuario";
            }
        }
        break;
    
    case 'login':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Procesar el inicio de sesión
            $nombre = $_POST['usuario'];
            $password = $_POST['contrasena'];
            $pregunta_seguridad = isset($_POST['pregunta_seguridad']) ? $_POST['pregunta_seguridad'] : '';
            $respuesta_pregunta = isset($_POST['respuesta_pregunta']) ? $_POST['respuesta_pregunta'] : '';
            
            $usuario = new Usuario($nombre, $password, $pregunta_seguridad, $respuesta_pregunta);
            $resultado = $usuario->iniciarSesion();
            
            if ($resultado) {
                session_start();
                $_SESSION['usuario'] = $nombre;
                header('Location: ../views/dashboard.php');
                exit; // Termina el script después de redirigir
            } else {
                echo "Nombre de usuario o contraseña incorrectos";
            }
        }
        break;

    default:
        echo "Opción no válida";
        break;
}
?>
