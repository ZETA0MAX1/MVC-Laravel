<?php

include_once("../models/conexion.php"); // Incluye la clase de conexión a la base de datos

class SupplierModel {

    // Método para obtener todos los empleados
    public static function getAllSupplier() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $sql = "SELECT COUNT(*) as total FROM suppliers";
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
    public static function getSupplierById($SupplierID) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $ProductID = $conn->real_escape_string($SupplierID);
        $sql = "SELECT Addresss, City, ContactName, Country,Phone,PostalCode,SupplierID,SupplierName FROM suppliers WHERE SupplierID = '$SupplierID'";
        $result = $conn->query($sql);

        $ProductID = null;

        if ($result->num_rows == 1) {
            $ProductID = $result->fetch_assoc();
        }

        $conn->close();

        return $ProductID;
    }

    // Método para actualizar un empleado
    public static function updateSupplier($Addresss,$City, $ContactName,$Country,$Phone,$PostalCode,$SupplierID,$SupplierName) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
    
        // Escapar las variables para prevenir inyecciones SQL
        $Addresss = $conn->real_escape_string($Addresss);
        $City = $conn->real_escape_string($City);
        $ContactName = $conn->real_escape_string($ContactName);
        $Country = $conn->real_escape_string($Country);
        $Phone = $conn->real_escape_string($Phone);
        $PostalCode = $conn->real_escape_string($PostalCode);
        $SupplierID = $conn->real_escape_string($SupplierID);
        $SupplierName = $conn->real_escape_string($SupplierName);

    
        // Consulta SQL para actualizar el registro
        $sql = "UPDATE suppliers SET Addresss = '$Addresss',City = '$City', ContactName = '$ContactName', Phone = '$Phone',Country='$Country',PostalCode = '$PostalCode',SupplierID='$SupplierID',SupplierName = '$SupplierName' WHERE SupplierID = '$SupplierID'";
    
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

    
    public static function deleteSupplier($SupplierID) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $SupplierID = $conn->real_escape_string($SupplierID);

        // Consulta SQL para eliminar el registro usando consultas preparadas
        $sql = "DELETE FROM suppliers WHERE SupplierID = '$SupplierID'";

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
    public static function registerSupplier($Addresss,$City, $ContactName,$Country,$Phone,$PostalCode,$SupplierID,$SupplierName) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $Addresss = $conn->real_escape_string($Addresss);
        $City = $conn->real_escape_string($City);
        $ContactName = $conn->real_escape_string($ContactName);
        $Country = $conn->real_escape_string($Country);
        $Phone = $conn->real_escape_string($Phone);
        $PostalCode = $conn->real_escape_string($PostalCode);
        $SupplierID = $conn->real_escape_string($SupplierID);
        $SupplierName = $conn->real_escape_string($SupplierName);

        $sql = "INSERT INTO suppliers (Addresss,City, ContactName,Country, Phone,PostalCode,SupplierID,SupplierName) VALUES ('$Addresss','$City', '$ContactName','$Country','$Phone', '$PostalCode','$SupplierID', '$SupplierName')";
        
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
