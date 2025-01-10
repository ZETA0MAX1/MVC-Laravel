<?php
require_once("crud.php");
class Usuario extends crud{
    public function __construct(
        public string $nombre="",
        public string $password="",
        public string $pregunta_seguridad="",
        public string $respuesta_pregunta=""

    ){
        parent::__construct("usuarios");
    }

    public function RegistrarUsuario() {
        $passwordEncriptada = password_hash($this->password, PASSWORD_DEFAULT);
       try{
        $this->crear(" (usuario, contrasena, pregunta_seguridad, respuesta_pregunta)", "(?, ?, ?, ?)", [$this->nombre, $passwordEncriptada, $this->pregunta_seguridad, $this->respuesta_pregunta]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
    }
    }

    public function iniciarSesion() {
        $usuario = $this->buscarUsuarioPorNombre($this->nombre);
        var_dump($usuario);
        if ($usuario && isset($usuario->contrasena)) {
            if (password_verify($this->password, $usuario->contrasena)) {
                $_SESSION["logeado"] = $this->nombre;
                return $usuario;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    
    public function verificarRespuestaSeguridad($pregunta_seguridad, $respuesta_pregunta) {
        
        $usuario = $this->buscarUsuarioPorNombre($this->nombre);
        var_dump($usuario); 
        if (!$usuario) {
            return false; 
        }
        var_dump($usuario->pregunta_seguridad); // Verifica la pregunta de seguridad almacenada
        var_dump($usuario->respuesta_pregunta); // Verifica la respuesta almacenada
        var_dump($pregunta_seguridad); // Verifica la pregunta de seguridad enviada
        var_dump($respuesta_pregunta);
        
        if ($usuario->pregunta_seguridad === $pregunta_seguridad && $usuario->respuesta_pregunta === $respuesta_pregunta) {
            return true; 
        } else {
            return false; 
        }
    }

    
    public function olvideContraseña($nuevacontraseña){

        $usuario = $this->buscarUsuarioPorNombre($this->nombre); 
        if (!$usuario) {
            return false;
        }
        $nuevaContraseñaEncriptada = password_hash($nuevacontraseña, PASSWORD_DEFAULT);
        try {
            
            $this->modificar("contrasena = ?", [$nuevaContraseñaEncriptada], "contrasena = ?", [$this->nombre]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    
}
 
