<?php
include_once("../models/UserModel.php");
require_once ('../models/usuario.php');

$option = isset($_GET['option']) ? $_GET['option'] : '';

switch ($option) {
    
    case 'recuperar_contrasena':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST['usuario'];
            $pregunta_seguridad = $_POST['pregunta_seguridad'];
            $respuesta_pregunta = $_POST['respuesta_pregunta'];

            $objUser = new UserModel();
            $respuesta = $objUser->verificarRespuestaSeguridad($usuario, $pregunta_seguridad, $respuesta_pregunta);

            if ($respuesta === true) {
                header("Location: ../views/cambio_de_contraseña.php");
                exit();
            } else {
                header("Location: UsuarioController.php?option=recuperar_contrasena&error=" . urlencode($respuesta));
            }
        } else {
            header("Location: UsuarioController.php?option=recuperar_contrasena");
        }
        break;

    case 'cambiar_contrasena':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST['usuario'];
            $pregunta_seguridad = $_POST['pregunta_seguridad'];
            $respuesta_pregunta = $_POST['respuesta_pregunta'];
            $nueva_contrasena = $_POST['nueva_contrasena'];

            $objUser = new UserModel();
            $respuesta = $objUser->cambiarContrasena($usuario, $pregunta_seguridad, $respuesta_pregunta, $nueva_contrasena);

            if ($respuesta === true) {
                header("Location: ../views/login.php?message=Contraseña cambiada exitosamente");
                exit();
            } else {
                header("Location: ../paginas/cambio_de_contrasena.php?error=" . urlencode($respuesta));
            }
        } else {
            header("Location: ../paginas/cambio_de_contrasena.php");
        }
        break;
    default:
        header("Location: UsuarioController.php?option=login");
        break;
    
}
?>