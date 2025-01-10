<?php

include_once("../models/conexion.php"); // Incluye la clase de conexión a la base de datos

class CustomerModel {

    
    public static function getAllCustomer() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $sql = "SELECT COUNT(*) as total FROM customers";
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

    
    public static function getClienteById($id) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $id = $conn->real_escape_string($id);
        $sql = "SELECT CustomerID, CustomerName,ContactName, Addresss, City, PostalCode, Country FROM customers WHERE CustomerID = '$id'";
        $result = $conn->query($sql);

        $cliente = null;

        if ($result->num_rows == 1) {
            $cliente = $result->fetch_assoc();
        }

        $conn->close();

        return $cliente;
    }

    
    public static function updateCustomer($id, $name, $contactName, $address, $city, $postal_code, $country) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
    
        
        $id = $conn->real_escape_string($id);
        $name = $conn->real_escape_string($name);
        $contactName = $conn->real_escape_string($contactName);
        $address = $conn->real_escape_string($address);
        $city = $conn->real_escape_string($city);
        $postal_code = $conn->real_escape_string($postal_code);
        $country = $conn->real_escape_string($country);
    
        
        $sql = "UPDATE customers SET CustomerName = '$name', ContactName = '$contactName', Addresss = '$address', City = '$city', PostalCode = '$postal_code', Country = '$country' WHERE CustomerID = '$id'";
    
        // Ejecutar la consulta y verificar si fue exitosa
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    
    public static function deleteCliente($id) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $id = $conn->real_escape_string($id);

        $sql = "DELETE FROM customers WHERE CustomerID = '$id'";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    
    public static function registerCliente($id, $name,$contactName, $address, $city, $postalCode, $country) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $id = $conn->real_escape_string($id);
        $name = $conn->real_escape_string($name);
        $contactName = $conn->real_escape_string($contactName);
        $address = $conn->real_escape_string($address);
        $city = $conn->real_escape_string($city);
        $postalCode = $conn->real_escape_string($postalCode);
        $country = $conn->real_escape_string($country);

        $sql = "INSERT INTO customers (CustomerID, CustomerName, ContactName, Addresss, City, PostalCode, Country) VALUES ('$id','$name', '$contactName', '$address', '$city', '$postalCode', '$country')";
        
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

