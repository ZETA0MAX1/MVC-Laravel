<?php

include_once("../models/conexion.php"); // Incluye la clase de conexión a la base de datos

class ShipperModel {

    // Método para obtener todos los empleados
    public static function getAllShipper() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $sql = "SELECT COUNT(*) as total FROM shippers";
        $result = $conn->query($sql);
        
        $count = 0;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $count = $row['total'];
            }
        }

        $conn->close();

        return $count;
    }

    // Método para obtener un empleado por su ID
    public static function getShipperById($ShipperID) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $ShipperID = $conn->real_escape_string($ShipperID);
        $sql = "SELECT Phone, ShipperID, ShipperName FROM shippers WHERE ShipperID = '$ShipperID'";
        $result = $conn->query($sql);

        $ProductID = null;

        if ($result->num_rows == 1) {
            $ProductID = $result->fetch_assoc();
        }

        $conn->close();

        return $ProductID;
    }

    // Método para actualizar un empleado
    public static function updateShipper($Phone,$ShipperID, $ShipperName) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
    
        // Escapar las variables para prevenir inyecciones SQL
        $Phone = $conn->real_escape_string($Phone);
        $ShipperID = $conn->real_escape_string($ShipperID);
        $ShipperName = $conn->real_escape_string($ShipperName);
    
        // Consulta SQL para actualizar el registro
        $sql = "UPDATE shippers SET Phone = '$Phone',ShipperID = '$ShipperID', ShipperName = '$ShipperName' WHERE ShipperID = '$ShipperID'";
    
        // Ejecutar la consulta y verificar si fue exitosa
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    // Método para eliminar un empleado por su ID

    
    public static function deleteShipper($ShipperID) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $ShipperID = $conn->real_escape_string($ShipperID);

        // Consulta SQL para eliminar el registro usando consultas preparadas
        $sql = "DELETE FROM shippers WHERE ShipperID = '$ShipperID'";

        // Preparar la declaración
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
    
        

    // Método para registrar un nuevo empleado
    public static function registerShipper($Phone,$ShipperID, $ShipperName) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $Phone = $conn->real_escape_string($Phone);
        $ShipperID = $conn->real_escape_string($ShipperID);
        $ShipperName = $conn->real_escape_string($ShipperName);

        $sql = "INSERT INTO shippers (Phone,ShipperID, ShipperName) VALUES ('$Phone','$ShipperID', '$ShipperName')";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
}
?>
