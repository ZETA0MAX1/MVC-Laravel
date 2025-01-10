<?php

include_once("../models/conexion.php"); // Incluye la clase de conexión a la base de datos

class EmployeeModel {

    
    public static function getAllEmployee() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $sql = "SELECT COUNT(*) as total FROM employees";
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

    
    public static function getEmployeeById($id) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $id = $conn->real_escape_string($id);
        $sql = "SELECT EmployeeID, FirstName, LastName, BirthDate, Notes, Photo FROM employees WHERE EmployeeID = '$id'";
        $result = $conn->query($sql);

        $employee = null;

        if ($result->num_rows == 1) {
            $employee = $result->fetch_assoc();
        }

        $conn->close();

        return $employee;
    }

    
    public static function updateEmployee($id,$firstName, $lastName, $birthDate, $notes, $photo) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
    
        
        $id = $conn->real_escape_string($id);
        $firstName = $conn->real_escape_string($firstName);
        $lastName = $conn->real_escape_string($lastName);
        $birthDate = $conn->real_escape_string($birthDate);
        $notes = $conn->real_escape_string($notes);
        $photo = $conn->real_escape_string($photo);
    
        
        $sql = "UPDATE employees SET EmployeeID = '$id',FirstName = '$firstName', LastName = '$lastName', BirthDate = '$birthDate', Notes = '$notes', Photo = '$photo' WHERE EmployeeID = '$id'";
    
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    
    public static function deleteEmployee($id) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $id = $conn->real_escape_string($id);

        $sql = "DELETE FROM employees WHERE EmployeeID = '$id'";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    
    public static function registerEmployee($EmployeeID,$FirstName, $LastName, $BirthDate, $Notes, $Photo) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $EmployeeID = $conn->real_escape_string($EmployeeID);
        $FirstName = $conn->real_escape_string($FirstName);
        $LastName = $conn->real_escape_string($LastName);
        $BirthDate = $conn->real_escape_string($BirthDate);
        $Notes = $conn->real_escape_string($Notes);
        $Photo = $conn->real_escape_string($Photo);

        $sql = "INSERT INTO employees (EmployeeID,FirstName, LastName, BirthDate, Notes, Photo) VALUES ('$EmployeeID','$FirstName', '$LastName', '$BirthDate', '$Notes', '$Photo')";
        
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


