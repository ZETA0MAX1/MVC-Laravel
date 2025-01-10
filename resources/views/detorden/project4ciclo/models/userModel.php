<?php
include_once("conexion.php");

class UserModel {

    private $conn;

    public function __construct() {
        $objCon = new Conexion();
        $this->conn = $objCon->getConexion();
    }

    public function verificarRespuestaSeguridad($usuario, $pregunta_seguridad, $respuesta_pregunta) {
        $sql = "SELECT respuesta_pregunta FROM usuarios WHERE usuario = ? AND pregunta_seguridad = ?";
        $stmt = $this->conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ss", $usuario, $pregunta_seguridad);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($respuesta_pregunta === $row['respuesta_pregunta']) {
                    return true; 
                } else {
                    return "Respuesta incorrecta";
                }
            } else {
                return "Usuario o pregunta de seguridad incorrecta";
            }
        } else {
            return "Error en la preparación de la consulta";
        }
    }
    public function cambiarContrasena($usuario, $pregunta_seguridad, $respuesta_pregunta, $nueva_contrasena) {
        $stmt = null; 
    
        try {
            if ($this->verificarRespuestaSeguridad($usuario, $pregunta_seguridad, $respuesta_pregunta) === true) {
                $hashed_new_pass = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
    
                $sql = "UPDATE usuarios SET contrasena = ? WHERE usuario = ? AND pregunta_seguridad = ?";
                $stmt = $this->conn->prepare($sql);
    
                if ($stmt) {
                    $stmt->bind_param("sss", $hashed_new_pass, $usuario, $pregunta_seguridad);
                    if ($stmt->execute()) {
                        return true; // Contraseña actualizada
                    } else {
                        throw new Exception("Error al actualizar la contraseña: " . $stmt->error);
                    }
                } else {
                    throw new Exception("Error en la preparación de la consulta de actualización");
                }
            } else {
                return "La respuesta de seguridad no coincide";
            }
        } catch (Exception $e) {
            return "Error en la consulta: " . $e->getMessage();
        } finally {
            if ($stmt) {
                $stmt->close();
            }
            $this->conn->close();
        }
    }
    


}
?>
