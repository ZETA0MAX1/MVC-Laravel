<?php

include_once(__DIR__."/conexion.php"); // Incluye la clase de conexión a la base de datos

class OrderModel {

    // Método para obtener todos los empleados
    public static function getAllOrder() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $sql = "SELECT COUNT(*) as total FROM orders";
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
    public static function getOrderById($OrderID) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $OrderID = $conn->real_escape_string($OrderID);
        $sql = "SELECT OrderID,EmployeeID, ShipperID, OrderDate, CustomerID FROM orders WHERE OrderID = '$OrderID'";
        $result = $conn->query($sql);

        $OrderID = null;

        if ($result->num_rows == 1) {
            $OrderID = $result->fetch_assoc();
        }

        $conn->close();

        return $OrderID;
    }

    // Método para actualizar un empleado
    public static function updateOrder($CustomerID, $EmployeeID, $OrderDate, $OrderID, $ShipperID) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
    
        // Preparar la consulta utilizando prepared statements
        $sql = "UPDATE orders SET CustomerID = ?, EmployeeID = ?, OrderDate = ?, ShipperID = ? WHERE OrderID = ?";
        $stmt = $conn->prepare($sql);
    
        // Vincular parámetros y ejecutar la consulta
        $stmt->bind_param("ssssi", $CustomerID, $EmployeeID, $OrderDate, $ShipperID, $OrderID);
        $stmt->execute();
    
        // Verificar si la actualización fue exitosa
        if ($stmt->affected_rows > 0) {
            $stmt->close();
            $conn->close();
            return true;
        } else {
            $stmt->close();
            $conn->close();
            return false;
        }
    }
    

    // Método para eliminar un empleado por su ID
    public static function deleteOrder($OrderID) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $OrderID = $conn->real_escape_string($OrderID);

        $sql = "DELETE FROM orders WHERE OrderID = '$OrderID'";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    // Método para registrar un nuevo empleado
    public static function registerOrder($CustomerID,$EmployeeID, $OrderDate, $OrderID,$ShipperID) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $CustomerID = $conn->real_escape_string($CustomerID);
        $EmployeeID = $conn->real_escape_string($EmployeeID);
        $OrderDate = $conn->real_escape_string($OrderDate);
        $OrderID = $conn->real_escape_string($OrderID);
        $ShipperID = $conn->real_escape_string($ShipperID);

        $sql = "INSERT INTO orders (CustomerID,EmployeeID, OrderDate, OrderID,ShipperID) VALUES ('$CustomerID','$EmployeeID', '$OrderDate','$ShipperID', '$OrderID')";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
    public static function getShippers() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $sql = "SELECT ShipperID, ShipperName FROM shippers";
        $result = $conn->query($sql);

        $shippers = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $shippers[] = $row;
            }
        }

        $conn->close();
        return $shippers;
    }

    public static function getEmployees() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $sql = "SELECT EmployeeID, CONCAT(FirstName, ' ', LastName) AS EmployeeName FROM employees";
        $result = $conn->query($sql);

        $employees = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $employees[] = [
                    'EmployeeID' => $row['EmployeeID'],
                    'EmployeeName' => $row['EmployeeName']
                ];
            }
    }

        $conn->close();
        return $employees;
    }

    public static function getCustomers() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $sql = "SELECT CustomerID, CustomerName FROM customers";
        $result = $conn->query($sql);

        $customers = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $customers[] = $row;
            }
        }

        $conn->close();
        return $customers;
    }
}
?>


